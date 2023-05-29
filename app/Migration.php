<?php

namespace Main\app;

abstract class Migration{
    
    abstract public function up();
    abstract public function down();
    protected static array $varchar = [];

    protected static function createTable(string $table, string $query){
       $db = Application::$app->db;
       $SQL =  "CREATE TABLE IF NOT EXISTS $table($query) ENGINE=INNODB;";
       $db->pdo->exec($SQL);
    }

    protected function dropTable(string $table){
       $db = Application::$app->db;
       $SQL =  "DROP TABLE  IF EXISTS $table;";
       $db->pdo->exec($SQL);
    }
}