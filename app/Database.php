<?php

namespace Main\app;

class Database
{

    public \PDO $connection;


    public function __construct(array $config, string $user = "root", string $password = "")
    {
        // dd($config);
        $dsn  = "mysql:" . http_build_query($config['db']['dsn'], '', ';') ?? '';
        $this->connection = new \PDO($dsn, $user, $password);
        $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function statement($query): \PDOStatement
    {
        return  $this->connection->prepare($query);
        // return $statement->execute();
    }

    public function query($query, $params = [])
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);
        return $statement;
    }

    public function applyMigrations()
    {
        $this->createMigrationsTable();
        $appliedMigrations = $this->AppliedMigrations();
        $migrations = scandir(Application::$APP_ROOT . "/migrations");
        $toApplyMigrations = array_diff($migrations, $appliedMigrations);
        $newMigrations = [];

        foreach ($toApplyMigrations as $migration) {
            if ($migration === '.' || $migration === "..") {
                continue;
            }
            //  die(var_dump($migration));

            require_once Application::$APP_ROOT . "/migrations/$migration";
            $className = pathinfo($migration, PATHINFO_FILENAME);
            // die(var_dump(pathinfo($migration, PATHINFO_FILENAME)));
            $instance = new $className();
            $this->log("Applying migration $migration");
            $instance->up();
            $this->log("Migration Applied : $migration");
            $newMigrations[] = $migration;
        }

        if (!empty($newMigrations)) {
            $this->saveMigrations($newMigrations);
        } else {
            $this->log("All Migrations Are Applied");
        }
    }


    public function createMigrationsTable()
    {
        $this->connection->exec("CREATE TABLE IF NOT EXISTS migrations(
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=INNODB;");
    }

    public function AppliedMigrations()
    {
        $statement = $this->connection->prepare("SELECT migration FROM migrations");
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_COLUMN);
    }

    public function saveMigrations(array $migrations)
    {
        $migrations  = implode(",", array_map(fn ($m) => "('$m')", $migrations));
        $statement = $this->connection->prepare("INSERT INTO migrations(migration) VALUES($migrations)");
        $statement->execute();
    }

    protected function log($message)
    {
        echo PHP_EOL . '[ ' . date('Y-m-d H:i:s') . ' ] - ' . $message . PHP_EOL;
    }
}
