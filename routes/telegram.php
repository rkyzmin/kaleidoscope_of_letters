<?php

 /** @var SergiX44\Nutgram\Nutgram $bot */
use App\Models\InterfaceCommand;

use function PHPUnit\Framework\callback;

/*
|--------------------------------------------------------------------------
| Nutgram Handlers
|--------------------------------------------------------------------------
|
| Here is where you can register telegram handlers for Nutgram. These
| handlers are loaded by the NutgramServiceProvider. Enjoy!
|
*/

InterfaceCommand::init($bot);