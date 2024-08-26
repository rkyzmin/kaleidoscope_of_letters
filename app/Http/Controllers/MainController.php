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
    public function __construct()
    {
        $this->middleware('auth_tg');
    }

    public function index(Request $request)
    {
        $userId = $request->userId ?? '958559997';
        return view('main.index', compact('userId'));
    }

    public function game(Request $request)
    {
        $userId = $request->userId;
        $rows = Main::getInputWords();
        $letters = Main::getLetters();
        return view('main.game', compact('rows', 'letters', 'userId'));
    }

    public function settings(Request $request)
    {
        $userId = $request->userId;
        return view('main.settings', compact('userId'));
    }

    public function result(Request $request)
    {
        $time = $request->time;
        $word = $request->word;
        $resultFrom = $request->this;
        $userId = $request->userId;
        $resultData = [];

        $user = User::where('telegram_id', $userId)->first();

        if (!$user) {
            return false;
        }

        $resultUser = $user->Result;
        if (!$resultUser) {
            $result = new Result();
            $data = [
                [
                    'word' => $word,
                    'time' => $time,
                    'this' => $resultFrom,
                ],
            ];

            $result->user_id = $user->id;
            $result->data = json_encode($data, JSON_UNESCAPED_UNICODE);
            $result->save();
        } else {
            $data = [
                'word' => $word,
                'time' => $time,
                'this' => $resultFrom,
            ];

            $dataResult = json_decode($resultUser->data, 1);
            $dataResult[] = $data;
            $resultUser->data = $dataResult;
            $resultUser->save();
        }

        if ($resultUser) {
            $resultDataCollect = collect($resultUser->data);
            $sortByTime = $resultDataCollect->sortBy('time');
            $sortByTime->values()->all();
            
            $resultData = $sortByTime->slice(0, 9);
            $resultData->all();

            $resultData = $resultData->map(function ($item, $index) {
                if ($item['this'] === 'true') {
                    $item['this'] = 'Победа';
                }

                if ($item['this'] === 'false') {
                    $item['this'] = 'Проигрыш';
                }
            
                return $item;
            });
        }

        return view('main.result', compact('userId', 'resultData'));
    }

    public function saveSettings(Request $request)
    {
        $countWords = $request->count_words;
        $theme = $request->theme;
        $isTimer = $request->is_timer;
        $userId = $request->user_id;

        $user = User::where('telegram_id', $userId)->first();
        if (!$user->Settings) {
            $settings = new Settings();
            $settings->user_id = $user->id;
            $settings->count_words = $countWords;
            $settings->theme = $theme;
            $settings->is_timer = $isTimer == 'true' ? 1 : 0;
            $settings->save();
        } else {
            $settings = $user->Settings;
            $settings->count_words = $countWords;
            $settings->theme = $theme;
            $settings->is_timer = $isTimer == 'true' ? 1 : 0;
            $settings->save();
        }
    }
}
