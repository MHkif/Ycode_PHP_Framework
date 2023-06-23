<?php

namespace Main\app\Http\Controllers;
// use Main\app\Renderable;

class SiteController extends Controller
{
    public function index()
    {
        $params = [
            'name' => "Abdelmalek Achkif"
        ];

        // return Renderable::view('home', $params);
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
