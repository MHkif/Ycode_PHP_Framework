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

    public static function get($path, $handler)
    {
        self::$routes[self::METHOD_GET][$path] = $handler;
    }

    public static function post($path, $handler)
    {
        self::$routes[self::METHOD_POST][$path] = $handler;
    }

    public static function put($path, $handler)
    {
        self::$routes[self::METHOD_PUT][$path] = $handler;
    }

    public static function patch($path, $handler)
    {
        self::$routes[self::METHOD_PATCH][$path] = $handler;
    }


    public static function delete($path, $handler)
    {
        self::$routes[self::METHOD_DELETE][$path] = $handler;
    }



    public function resolve()
    {
        $path = $this->request->get_path();
        // die(var_dump($path));
        $method = $this->request->get_method();
        $handler = self::$routes[$method][$path] ?? false;

        if ($handler === false) {
            $this->response->httpStatusCode(404);
            return $this->renderView('_404');
        }

        if (is_string($handler)) {
            return $this->renderView($handler);
        }
        if (is_array($handler)) {

            // $site = new SiteController();
            // $app->router->get('/', [$site, 'index']);
            
            $handler[0] = new $handler[0]();
        }
        return call_user_func($handler, $this->request);
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
