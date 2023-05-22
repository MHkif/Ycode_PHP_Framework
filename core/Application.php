<?php
// app namespace
namespace app\core;

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
        $this->db = new Database($config['db']);
        self::$APP_ROOT = $app_root;
    }

    public function run()
    {
        // run the resolve method  from router 
        echo  $this->router->resolve();
    }
}
