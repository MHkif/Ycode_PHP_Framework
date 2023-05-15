<?php

namespace app\core;

class Response
{

    public function httpStatusCode($code)
    {
        return http_response_code($code);
    }
}
