<?php
use App\Http\Controllers\BotManController;
use BotMan\BotMan\Middleware\Dialogflow;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});
$botman->hears('Start conversation', BotManController::class.'@startConversation');

$botman->hears('(1|.*[a/A]pply.*)', BotManController::class.'@apply');

$botman->hears('(2|[f/F][a/A][q/Q]|got a question|frequent questions)', BotManController::class.'@faq');

$dialogflow = Dialogflow::create(env('DIALOGFLOW_TOKEN'))->listenForAction();
$botman->middleware->received($dialogflow);

$botman->hears('feedback', function ($bot) {
    // The incoming message matched the "my_api_action" on Dialogflow
    // Retrieve Dialogflow information:
    $extras = $bot->getMessage()->getExtras();
    $apiReply = $extras['apiReply'];
    $apiAction = $extras['apiAction'];
    $apiIntent = $extras['apiIntent'];
    if (!preg_match('(1|.*[a/A]pply.*|2|[f/F][a/A][q/Q]|got a question|frequent questions)', $apiAction)) {
        logger('Feedback:' . json_encode($extras));
        $bot->reply('Thanks for your feedback!');
    }

})->middleware($dialogflow);

$botman->hears('(support.*)', function ($bot) {
    // The incoming message matched the "my_api_action" on Dialogflow
    // Retrieve Dialogflow information:
    $extras = $bot->getMessage()->getExtras();
    $apiReply = $extras['apiReply'];
    $apiAction = $extras['apiAction'];
    $apiIntent = $extras['apiIntent'];
    if (!preg_match('(1|.*[a/A]pply.*|2|[f/F][a/A][q/Q]|got a question|frequent questions)', $apiAction)) {
        $bot->reply($apiReply);
    }
})->middleware($dialogflow);

$botman->fallback(function($bot) {
    $bot->randomReply(["Sorry! I'm not ready to understand this message. <br> Type 'Apply for a job' o 'FAQ' to start a conversation.",
        "Oops! I didn't get u", "Ahmm. I don't remember what does it mean, ask me something else!"]);
});