<?php

use Main\app\Renderable;
use Main\app\Response;

function dd($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";

    exit;
}


function abort($page = Response::HTTP_NOT_FOUND)
{
    return Renderable::view("responses/" . $page);
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



