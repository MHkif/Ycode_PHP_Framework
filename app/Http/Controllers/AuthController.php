<?php

namespace Main\app\Http\Controllers;

use Main\app\Request;
use Main\models\AuthModel;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $auth = new AuthModel();
        $request_body = Request::requests_all();
        $auth->load_data($request_body);
       
        if ($auth->validate("login")) {
            return $this->view('home', [
                'name' => "Abdelmalek Achkif",
            ]);
        }
        // die(var_dump($auth->errors));

        return $this->view('login', [
            'auth' => $auth,
        ]);
    }

    public function register(Request $request)
    {

        $auth = new AuthModel();
        $request_body = Request::requests_all();
        $auth->load_data($request_body);
        // die(var_dump($auth));
        if ($auth->validate("register")) {
            return "Register Form Submitted";
        }
        // die(var_dump($auth->errors));

        return $this->view('register', [
            'auth' => $auth,
        ]);
    }
}
