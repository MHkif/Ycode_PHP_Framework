<?php

namespace app\core;

class Request
{
    private $_global_path;
    public function __construct()
    {
        $this->_global_path = $_SERVER['REQUEST_URI'] ?? '/';
    }

    public function get_path()
    {
        $position = strpos($this->_global_path, "?") ?? false;
        if ($position === false) {
            return $this->_global_path;
        }
        $path = substr($this->_global_path, 0, $position);
        return $path;
    }

    public function get_method()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        return strtolower($method);
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
}
