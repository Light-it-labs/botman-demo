<?php

namespace App\Http\Controllers;

use App\Conversations\JobApplication;
use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use App\Conversations\ExampleConversation;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->listen();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tinker()
    {
        return view('tinker');
    }

    /**
     * Loaded through routes/botman.php
     * @param  BotMan $bot
     */
    public function startConversation(BotMan $bot)
    {
        $bot->startConversation(new ExampleConversation());
    }

    public function apply(BotMan $bot)
    {
        $bot->startConversation(new JobApplication());
    }

    public function faq(BotMan $bot)
    {
        $bot->reply('You can ask questions about me or my creators.');
        $bot->reply('Ask me and I hope to be helpful');
    }
}
