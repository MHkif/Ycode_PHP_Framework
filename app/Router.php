<?php

namespace Main\app;

// use app\core\Http\Controllers;

class Router
{

    public Request $request;
    public Response $response;
    private static $routes = [];

    private const METHOD_GET = "get";
    private const METHOD_POST = "post";
    private const METHOD_PUT = "put";
    private const METHOD_PATCH = "patch";
    private const METHOD_DELETE = "delete";

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

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
        $path = $this->request->get_path();
        $method = $this->request->get_method();
        $controller = self::$routes[$method][$path] ?? false;

        if ($controller === false) {
            $this->response->httpStatusCode(Response::HTTP_NOT_FOUND);
            return abort();
        }

        if (is_string($controller)) {
            return $this->renderView($controller);
        }
        if (is_array($controller)) {

            // $site = new SiteController();
            // $app->router->get('/', [$site, 'index']);

            $controller[0] = new $controller[0]();
        }
        return call_user_func($controller, $this->request);
    }

    protected function layout($layout = "main")
    {
        ob_start();
        include_once Application::$APP_ROOT . "/resources/views/layouts/" . $layout . ".php";
        return ob_get_clean();
    }

    protected function render($view, $params)
    {
        // foreach ($params as $key => $value) {
        //     $$key = $value;
        // }
        extract($params);

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
