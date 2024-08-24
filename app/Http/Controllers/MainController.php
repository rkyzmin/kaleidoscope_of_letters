<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->userId ?? null;
        return view('main.index', compact('userId'));
    }

    public function game()
    {
        $letters = [
            'class' => 'words_wrapper__row',
            'count' => 2,
            'style' => 
            'padding: 7px;
            background-color: gray;
            border-radius: 5px;
            margin-right: -1px;
            cursor: pointer;',


            'items' => [
                [
                    "й","ц","у","к","е","н","г","ш","щ","з","х","ъ",
                ],
                [
                    "ф","ы","в", "а","п","р","о","л","д","ж","э",
                ],
                [
                    "я","ч","с","м","и","т","ь","б","ю", "X",
                ]
            ],
        ];

        $rows = [
            'class' => 'enter_letters__wrapper__row',
            'count' => 6,
            'items' => [
                'count' => 5,
                'style' => 'width: 55px;height: 55px; font-size: 20px; font-weight: 500; text-align: center;',
            ],
        ];

        return view('main.game', compact('rows', 'letters'));
    }

    public function settings()
    {
        $userId =  Auth::id();
        return view('main.settings', compact('userId'));
    }

    public function result()
    {
        return view('main.result');
    }
    
    public function saveSettings(Request $request) 
    {
        $countWords = $request->count_words;
        $themes = $request->themes;
        $isTimer = $request->is_timer;

        dd($countWords, $themes, $isTimer);
    }
}
