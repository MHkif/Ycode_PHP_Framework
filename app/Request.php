<?php

namespace Main\app;

class Request
{
    private $_global_path;
    public function __construct()
    {
        $this->_global_path = $_SERVER['REQUEST_URI'] ?? '/';
    }

    public function get_path()
    {
        // $position = strpos($this->_global_path, "?") ?? false;
        // if ($position === false) {
        //     return $this->_global_path;
        // }
        // $path = substr($this->_global_path, 0, $position);
        $requestUri = parse_url($_SERVER['REQUEST_URI']);
        $path = $requestUri['path'];
        return $path;
    }

    public function get_method()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        return strtolower($method);
    }

    public function isMethod($key)
    {
        return $this->get_method() == $key;
    }

    public function get_params()
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

    public function requests_all()
    {
        $body = [];
        if ($this->get_method() === 'get') {

            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($this->get_method() === 'post') {

            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }
}
