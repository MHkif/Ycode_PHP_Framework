<?php

namespace app\core;

class Router
{

    public Request $request;
    private $routes = [];


    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
    }

    public function put($path, $callback)
    {
    }

    public function delete($path, $callback)
    {
    }

    public function resolve()
    {
        $path = $this->request->get_path();
        $method = $this->request->get_method();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            exit('404 Not Found');
        }

        if (is_string($callback)) {
            $filename = __DIR__ . "/../resources/views/" . $callback . ".php";
            if (file_exists($filename)) {
                // exit("The view $callback exists.");

            } else {
                exit("The view $callback does not exist.");
            }
        }
        return call_user_func($callback);
      

    }
}
