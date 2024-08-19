<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('main.index');
    }

    public function game()
    {
        return view('main.game');
    }

    public function settings()
    {
        return view('main.settings');
    }
}
