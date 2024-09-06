<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Helpers\Main;
use App\Models\Result;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MainController extends Controller
{
    private $user;
    public function __construct(Request $request)
    {
        $this->middleware('auth_game');
        $this->user = User::where('telegram_id', $request->userId)->first();
    }

    public function index(Request $request)
    {
        $userId = $this->user->telegram_id;
        return view('main.index', compact('userId'));
    }

    public function game(Request $request)
    {
        $rows = Main::getInputWords();
        $letters = Main::getLetters();
        $settings = $this->user->Settings;
        $showTimer = $settings->is_timer === 1 ? 'table' : 'none';

        return view('main.game', compact('rows', 'letters', 'showTimer'));
    }

    public function settings(Request $request)
    {
        return view('main.settings');
    }

    public function result(Request $request)
    {
        $resultUser = $this->user->Result;
        $userId = $this->user->telegram_id;

        if (!$resultUser) {
            return abort(404);
        }

        $resultDataCollect = collect(json_decode($resultUser->data, 1));
        $sortByTime = $resultDataCollect->sortBy('time');
        $sortByTime->values()->all();

        $resultData = $sortByTime->slice(0, 9);
        $resultData->all();

        //dd($resultData);

        $resultData = $resultData->map(function ($item, $index) {
            if ($item['this'] === 'true') {
                $item['this'] = 'Победа';
            }

            if ($item['this'] === 'false') {
                $item['this'] = 'Проигрыш';
            }

            return $item;
        });

        return view('main.result', compact('resultData', 'userId'));
    }
}
