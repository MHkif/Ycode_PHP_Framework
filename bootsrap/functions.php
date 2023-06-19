<?php

use Main\app\Application;
use Main\app\Response;

function dd($data)
{

    die(var_dump($data));
}


function abort($page = Response::HTTP_NOT_FOUND)
{
    return renderView("responses/" . $page);
}

function authorize($condition, $status = Response::HTTP_FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}

function isUri($uri)
{
    return $_SERVER['REQUEST_URI'] === $uri;
}

function layout($layout = "main")
{
    ob_start();
    include_once Application::$APP_ROOT . "/resources/views/layouts/" . $layout . ".php";
    return ob_get_clean();
}

function render($view, $params)
{
    // foreach ($params as $key => $value) {
    //     $$key = $value;
    // }
    
    extract($params);
    ob_start();
    include_once Application::$APP_ROOT . "/resources/views/$view.php";
    return ob_get_clean();
}

function renderContent($rendredView)
{
    $layout = layout('content');
    $layout = str_replace('{{title}}', $rendredView, $layout);
    return str_replace("{{content}}", $rendredView, $layout);
}


function renderView($view,  $params = [], $layout = "main")
{

    $layout = layout($layout);
    $rendredView = render($view, $params);
    $layout = str_replace('{{title}}', $view, $layout);
    return str_replace("{{content}}", $rendredView, $layout);
}
