<?php

namespace app\core\Http\Controllers;

use app\core\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // die(var_dump($request->requests_all()));
        $request_body = $this->requests();
        $email = $this->get_request("email");

        die(var_dump($request_body));
        return  "Login Form Submitted";
    }

    public function register(Request $request)
    {
        // die(var_dump($request->requests_all()));
        $request_body = $this->requests();
        $email = $this->get_request("email");

        die(var_dump($request_body));
        return  "Register Form Submitted";
    }
}
