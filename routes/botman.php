<?php
use App\Http\Controllers\BotManController;
use BotMan\BotMan\Middleware\Dialogflow;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});
$botman->hears('Start conversation', BotManController::class.'@startConversation');

$botman->hears('(1|.*[p/P]ostularme.*)', BotManController::class.'@postularme');

$botman->hears('(2|[f/F][a/A][q/Q]|tengo una pregunta|preguntas frecuentes)', BotManController::class.'@faq');

$dialogflow = Dialogflow::create(env('DIALOGFLOW_TOKEN'))->listenForAction();
$botman->middleware->received($dialogflow);

$botman->hears('feedback', function ($bot) {
    // The incoming message matched the "my_api_action" on Dialogflow
    // Retrieve Dialogflow information:
    $extras = $bot->getMessage()->getExtras();
    $apiReply = $extras['apiReply'];
    $apiAction = $extras['apiAction'];
    $apiIntent = $extras['apiIntent'];
    if (!preg_match('(1|.*[p/P]ostularme.*|2|[f/F][a/A][q/Q]|tengo una pregunta|preguntas frecuentes)', $extras['apiParameters']['message'])) {
        logger('Feedback:' . json_encode($extras));
        $bot->reply('Muchas gracias por tu feedback!');
    }

})->middleware($dialogflow);

$botman->hears('support.*', function ($bot) {
    // The incoming message matched the "my_api_action" on Dialogflow
    // Retrieve Dialogflow information:
    $extras = $bot->getMessage()->getExtras();
    $apiReply = $extras['apiReply'];
    $apiAction = $extras['apiAction'];
    $apiIntent = $extras['apiIntent'];

    if (!preg_match('(1|.*[p/P]ostularme.*|2|[f/F][a/A][q/Q]|tengo una pregunta|preguntas frecuentes)', $extras['apiParameters']['message'])) {
        $bot->reply($apiReply);
    }
})->middleware($dialogflow);

$botman->fallback(function($bot) {
    $bot->randomReply(['Perdon! Todavía no soy capaz de entender este mensaje. <br> Ingresa "Postularme" o "FAQ" para iniciar una conversación.',
        'Upps! No te entendí', 'Emmm. No recuerdo que quiere decir eso, preguntame otra cosa!']);
});