<?php

namespace Main\app;

class Request
{

   static function get_path()
    {
        $requestUri = parse_url($_SERVER['REQUEST_URI']);
        $path = $requestUri['path'];
        return $path;
    }

    static function get_method()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        return strtoupper($method);
    }


    static function get_params()
    {
        $params = [];
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, "?") ?? false;
        if ($position) {
            $all = substr($path, $position + 1);
            $params = explode("&", $all);
            return $params;
        } else {
            return false;
        }
    }

    static function requests_all()
    {
        $body = [];
        if (self::get_method() === 'GET') {

            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if (self::get_method() === 'POST') {

            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }
}
