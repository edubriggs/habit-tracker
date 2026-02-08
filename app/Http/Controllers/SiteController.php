<?php

namespace App\Http\Controllers;

class SiteController extends Controller
{
    //
    public function index()
    {
        $name = 'Paulo';
        $habits = ['Estudar', 'Correr', 'Trabalhar', 'Jogar'];
        return view("home",["name"=> $name,"habits"=> $habits]);
    }
}
