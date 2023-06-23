<?php

namespace Main\app;

class Application
{
    public static string $APP_ROOT;
    public static Application $app;
    public Router $router;
    public Database $db;

    public function __construct($app_root, array $config)
    {
        self::$app = $this;
        $this->router = new Router();
        $this->db = new Database($config, $config['db']['user']);
        self::$APP_ROOT = $app_root;
    }

    public function run()
    {
        // $users = $this->db->query("SELECT * FROM users WHERE id= :id", [":id" => 2])->findOrFail();
        // dd($users);


        // run the resolve method  from router 
        echo  $this->router->resolve();
    }
}
