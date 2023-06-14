<?php
// app namespace
namespace Main\app;

class Application
{
    public static string $APP_ROOT;
    public static Application $app;
    public Router $router;
    public Request $request;
    public Response $response;
    public Database $db;

    public function __construct($app_root, array $config)
    {
        // Create instance of a router 
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);

        $this->db = new Database($config, $config['db']['user']);
        self::$APP_ROOT = $app_root;
    }

    public function run()
    {
        $users = $this->db->query("SELECT * FROM users WHERE id= :id", [":id" => 2])->fetch(\PDO::FETCH_OBJ);
        echo "<pre>";
        dd($users);
        echo "</pre>";

        // run the resolve method  from router 
        echo  $this->router->resolve();
    }
}
