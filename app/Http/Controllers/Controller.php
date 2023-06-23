<?php

namespace Main\app\Http\Controllers;

use Main\app\Application;
use Main\app\Renderable;
use Main\app\Request;
use Main\app\Response;

class Controller extends Renderable
{

    // protected Request $request;
    // public function __construct()
    // {
    //     $this->request = new Request();
    // }
    // protected function view($view, $params = [], $layout = "main")
    // {
    //     // return Application::$app->router->renderView($view, $params, $layout);
    //     return self::renderView($view, $params, $layout);
    // }
    protected $middleware = [];

    public function getMiddleware(): array
    {
        return $this->middleware;
    }

    public function __call($method, $parameters)
    {
        // throw new BadMethodCallException(sprintf(
        //     'Method %s::%s does not exist.', static::class, $method
        // ));
    }

    // public function requests()
    // {
    //     return Request::requests_all();
    // }

    public function get_request(string $key)
    {
        if (isset(Request::requests_all()[$key])) {
            return Request::requests_all()[$key];
        } else {
            Response::httpStatusCode(406);
            return "The key $key is not defined .";
        }
    }
}
