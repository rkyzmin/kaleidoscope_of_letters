<?php
/** @var SergiX44\Nutgram\Nutgram $bot */

use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Attributes\UpdateTypes;

/*
|--------------------------------------------------------------------------
| Nutgram Handlers
|--------------------------------------------------------------------------
|
| Here is where you can register telegram handlers for Nutgram. These
| handlers are loaded by the NutgramServiceProvider. Enjoy!
|
*/

$bot->onCommand('start', function (Nutgram $bot) {
    $bot->sendGame('kaleidoscope_of_letters_bot');

    // $bot->on('callback_query', function ($query) use($bot) {
    //     $bot->answerCallbackQuery();
    // });

    $bot->fallbackOn(UpdateTypes::CALLBACK_QUERY, function (Nutgram $bot) {
        $bot->answerCallbackQuery([
            'callback_query_id' => $bot->callbackQuery()->id,
            'url' => 'https://kaleidoscope-letters.ru/public/boot',
        ]);
    });

    //return $bot->sendMessage('Hello, world!');
})->description('The start command!');
