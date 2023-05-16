<?php

namespace app\core\Http\Controllers;

use app\core\Application;
use app\core\Request;

class Controller
{

    protected Request $request;
    public function __construct()
    {
        $this->request = new Request();
    }
    protected function view($view, $params = [], $layout = "main")
    {
        return Application::$app->router->renderView($view, $params, $layout);
    }
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

    public function requests()
    {
        return $this->request->requests_all();
    }

    public function get_request(string $key)
    {
        if (isset($this->request->requests_all()[$key])) {
            return $this->request->requests_all()[$key];
        } else {
            Application::$app->response->httpStatusCode(406);
            return "The key $key is not defined .";
        }
    }
}
