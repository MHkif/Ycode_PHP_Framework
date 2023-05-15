<?php

namespace app\core\Http\Controllers;

use app\core\Application;

abstract class Controller
{

    protected function view($view, $params = [])
    {
        return Application::$app->router->renderView($view, $params);
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
}
