<?php

namespace Main\app\Http\Controllers;

use Main\app\Request;
use Main\app\models\AuthModel;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $auth = new AuthModel();
        $request_body = $this->requests();
        $auth->load_data($request_body);
        // die(var_dump($auth));
        if($auth->validate()){
            return "Login Form Submitted";
        }
        die(var_dump($auth->errors));
        return  "Login Form Submitted";
    }

    public function register(Request $request)
    {
     
        $auth = new AuthModel();
        $request_body = $this->requests();
        $auth->load_data($request_body);
        // die(var_dump($auth));
        if($auth->validate("register")){
            return "Register Form Submitted";
        }
        // die(var_dump($auth->errors));

        return $this->view('register', [
            'auth' => $auth ,
        ]);
    }
}
