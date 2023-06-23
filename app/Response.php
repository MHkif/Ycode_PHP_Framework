<?php

namespace Main\app;

class Response
{

    public const  HTTP_OK = 200;
    public const  HTTP_CREATED = 201;
    public const  HTTP_ACCEPTED = 202;
    public const  HTTP_NO_CONTENT = 204;
    public const  HTTP_BAD_REQUEST = 400;
    public const  HTTP_FORBIDDEN = 403;
    public const  HTTP_NOT_FOUND = 404;


    static function httpStatusCode($code)
    {
        return http_response_code($code);
    }

     function json($data, $status)
    {
    }
}
