<?php

namespace Main\app;

use Main\app\Application;

class Renderable
{


    protected static function setLayout($layout = "main")
    {
        ob_start();
        include_once Application::$APP_ROOT . "/resources/views/layouts/" . $layout . ".php";
        return ob_get_clean();
    }

    protected static function render($view, $params)
    {
        extract($params);
        ob_start();
        include_once Application::$APP_ROOT . "/resources/views/$view.php";
        return ob_get_clean();
    }


    static function view($view,  $params = [], $layout = "main")
    {
        $layout = self::setLayout($layout);
        $rendredView = self::render($view, $params);
        $layout = str_replace('{{title}}', $view, $layout);
        return str_replace("{{content}}", $rendredView, $layout);
    }
}
