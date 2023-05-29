<?php

namespace Main\app\Http\Controllers;


class SiteController extends Controller
{
    public function index()
    {
        $params = [
            'name' => "Mhkif"
        ];

        return $this->view('home', $params);
    }
    public function login()
    {

        return $this->view('login');
    }

    public function register()
    {
        return $this->view('register');
    }
}
