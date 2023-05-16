<?php

namespace app\core;

use app\core\Http\Controllers;

class Router
{

    public Request $request;
    public Response $response;
    private $routes = [];


    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }


    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function put($path, $callback)
    {
        $this->routes['put'][$path] = $callback;
    }

    public function delete($path, $callback)
    {
        $this->routes['delete'][$path] = $callback;
    }




    public function resolve()
    {
        $path = $this->request->get_path();
        $method = $this->request->get_method();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            $this->response->httpStatusCode(404);
            return $this->renderView('_404');
        }

        if (is_string($callback)) {
       
        }
        if (is_array($callback)) {

            // $site = new SiteController();
            // $app->router->get('/', [$site, 'index']);

            $callback[0] = new $callback[0]();
        }
        return call_user_func($callback, $this->request);
    }

    protected function layout($layout = "main")
    {
        ob_start();
        include_once Application::$APP_ROOT . "/resources/views/layouts/" . $layout . ".php";
        return ob_get_clean();
    }

    protected function render($view, $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once Application::$APP_ROOT . "/resources/views/$view.php";
        return ob_get_clean();
    }

    protected function renderContent($rendredView)
    {
        $layout = $this->layout('content');
        $layout = str_replace('{{title}}', $rendredView, $layout);
        return str_replace("{{content}}", $rendredView, $layout);
    }



    public function renderView($view,  $params = [], $layout = "main")
    {

        $layout = $this->layout($layout);
        $rendredView = $this->render($view, $params);
        $layout = str_replace('{{title}}', $view, $layout);
        return str_replace("{{content}}", $rendredView, $layout);
    }
}
