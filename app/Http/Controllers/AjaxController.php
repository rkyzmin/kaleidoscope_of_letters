<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Settings;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function saveSettings(Request $request)
    {
        try {
            $userId = $request->user_id;
            $user = User::where('telegram_id', $userId)->first();

            $countWords = $request->count_words;
            $theme = $request->theme;
            $isTimer = $request->is_timer;

            if (!$user->Settings) {
                $settings = new Settings();
                $settings->user_id = $userId;
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

            return Response([
                'result' => 'success',
            ], 200, [
                'Content-Type',
                'application/json'
            ]);
        } catch (Exception $e) {
            return Response([
                'result' => $e->getMessage(),
            ], 200, [
                'Content-Type',
                'application/json'
            ]);
        }
    }

    public function saveResult(Request $request)
    {
        try {
            $userId = $request->user_id;
            $user = User::where('telegram_id', $userId)->first();

            if (!$user) {
                return false;
            }

            $time = $request->time;
            $word = $request->letter;
            $resultFrom = $request->this;
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

            return Response([
                'result' => 'success',
            ], 200, [
                'Content-Type',
                'application/json'
            ]);
        } catch (Exception $e) {
            return Response([
                'result' => $e->getMessage(),
            ], 200, [
                'Content-Type',
                'application/json'
            ]);
        }
    }
}
