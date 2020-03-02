<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function main()
    {
        return view('welcome');
    }

    public function orders()
    {
        return view('home');
    }
}
