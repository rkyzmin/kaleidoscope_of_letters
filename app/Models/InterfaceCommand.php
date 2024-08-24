<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Attributes\UpdateTypes;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardMarkup;
use SergiX44\Nutgram\Telegram\Types\Keyboard\KeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\ReplyKeyboardMarkup;


class InterfaceCommand extends Model
{
    use HasFactory;

    public static function init(Nutgram $bot) 
    {
        $bot->onCommand('start', function (Nutgram $bot) {
            $bot->sendMessage('Добрый день!', [
                'reply_markup' => InlineKeyboardMarkup::make(true)->addRow(
                    InlineKeyboardButton::make('Запустить игру', callback_data: 'game'),
                )
            ]);
        
            $fio = $bot->user()->first_name . ' ' . $bot->user()->last_name;
            $userId = $bot->user()->id;

            if (!Auth::attempt(['telegram_id' => $userId])) {
                \App\Models\User::factory()->create([
                    'name' => $fio,
                    'email' => "$userId@game.com",
                    'password' => Hash::make($userId),
                    'role' => 5,
                    'telegram_id' => $userId,
                ]);

                $user = User::where('telegram_id', $userId)->first();
                Auth::login($user);
                $userIdddd = Auth::id();
                
                $bot->sendMessage($userIdddd);
            } else {
                $bot->sendMessage($userId);
            }
        });
        
        $bot->onCallbackQueryData('game', function (Nutgram $bot) {
            $bot->sendGame('kaleidoscope_of_letters_bot');
            $bot->fallbackOn(UpdateTypes::CALLBACK_QUERY, function (Nutgram $bot) {
                $userId = $bot->user()->id;
                $bot->answerCallbackQuery([
                    'callback_query_id' => $bot->callbackQuery()->id,
                    'url' => "https://kaleidoscope-letters.ru/public/index?userId=$userId",
                ]);
            });
        });
    }
}
