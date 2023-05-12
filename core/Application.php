<?php
// app namespace
namespace app\core;

class Application
{
    public Router $router;
    public Request $request;
    public function __construct()
    {
        // Create instance of a router 
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run()
    {
        // run the resolve method  from router 
        $this->router->resolve();
    }
}
