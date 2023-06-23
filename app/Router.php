<?php

namespace Main\app;

// use app\core\Http\Controllers;

class Router extends Renderable
{

    // public Request $request;
    // public Response $response;
    private static $routes = [];

    private const METHOD_GET = "GET";
    private const METHOD_POST = "POST";
    private const METHOD_PUT = "PUT";
    private const METHOD_PATCH = "PATCH";
    private const METHOD_DELETE = "DELETE";

    // public function __construct(Request $request, Response $response)
    // {
    //     $this->request = $request;
    //     $this->response = $response;
    // }

    public static function get($path, $controller)
    {
        self::$routes[self::METHOD_GET][$path] = $controller;
    }

    public static function post($path, $controller)
    {
        self::$routes[self::METHOD_POST][$path] = $controller;
    }

    public static function put($path, $controller)
    {
        self::$routes[self::METHOD_PUT][$path] = $controller;
    }

    public static function patch($path, $controller)
    {
        self::$routes[self::METHOD_PATCH][$path] = $controller;
    }


    public static function delete($path, $controller)
    {
        self::$routes[self::METHOD_DELETE][$path] = $controller;
    }



    public function resolve()
    {
        $path = Request::get_path();
        $method = Request::get_method();
        $controller = self::$routes[$method][$path] ?? false;

        if ($controller === false) {
            Response::httpStatusCode(Response::HTTP_NOT_FOUND);
            return abort();
        }

        if (is_string($controller)) {
            return self::view($controller);
        }
        if (is_array($controller)) {
            // EX : [0]=> "Main\app\Http\Controllers\SiteController" [1]=> "index" 
            // $site = new SiteController();
            $controller[0] = new $controller[0]();
        }
       
        return call_user_func($controller, new Request());
    }
}
