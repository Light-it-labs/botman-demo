<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});
$botman->hears('Start conversation', BotManController::class.'@startConversation');

$botman->hears('(1|[p/P]ostularme)', BotManController::class.'@postularme');

$botman->fallback(function($bot) {
    $bot->reply('Perdon! Todavía no soy capaz de entender este mensaje. <br> Ingresa "Postularme" o "FAQ" para iniciar una conversación.');
});