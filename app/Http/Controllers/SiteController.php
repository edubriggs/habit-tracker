<?php

namespace App\Http\Controllers;

class SiteController extends Controller
{
    //
    public function index()
    {
        $name = 'Paulo';
        $habits = ['Estudar', 'Correr', 'Trabalhar', 'Jogar'];
        return view("home", compact("name","habits"));
    }

    public function dashboard()
    {
        return view("dashboard");
    }
}
