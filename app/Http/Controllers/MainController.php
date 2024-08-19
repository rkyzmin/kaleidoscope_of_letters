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
        $rows = [
            'class' => 'enter_letters__wrapper__row',
            'count' => 6,
            'items' => [
                'count' => 5,
                'style' => 'width: 55px;height: 55px;',
            ],
        ];
        return view('main.game', compact('rows'));
    }

    public function settings()
    {
        return view('main.settings');
    }
}
