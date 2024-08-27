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
        return view('main.game', compact('rows', 'letters'));
    }

    public function settings(Request $request)
    {
        return view('main.settings');
    }

    public function result(Request $request)
    {
        $time = $request->time;
        $word = $request->word;
        $resultFrom = $request->this;
        $resultData = [];

        $resultUser = $this->user->Result;
        if (!$resultUser) {
            $result = new Result();
            $data = [
                [
                    'word' => $word,
                    'time' => $time,
                    'this' => $resultFrom,
                ],
            ];

            $result->user_id = $this->user->id;
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

        if (!$this->user->Settings) {
            $settings = new Settings();
            $settings->user_id = $this->user->id;
            $settings->count_words = $countWords;
            $settings->theme = $theme;
            $settings->is_timer = $isTimer == 'true' ? 1 : 0;
            $settings->save();
        } else {
            $settings = $this->user->Settings;
            $settings->count_words = $countWords;
            $settings->theme = $theme;
            $settings->is_timer = $isTimer == 'true' ? 1 : 0;
            $settings->save();
        }
    }
}
