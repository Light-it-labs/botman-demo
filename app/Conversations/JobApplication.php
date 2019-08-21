<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class JobApplication extends Conversation
{

    protected $firstname;
    protected $email;
    protected $experience;

    public function askFirstname()
    {
        $this->say('Great news!');
        $this->ask("What's your name?", function(Answer $answer){
            $this->firstname = $answer->getText();

            $this->say('Nice to meet you '. $this->firstname);
            $this->askEmail();
        });
    }

    public function askEmail()
    {
        $this->ask('May I have your e-email?', function(Answer $answer) {
            $this->email = $answer->getText();

            $this->askExperience();
        });
    }

    /**
     * First question
     */
    public function askExperience()
    {
        $this->say('Last question');
        $question = Question::create("Do you have experience with Laravel?")
            ->callbackId('ask_experience')
            ->addButtons([
                Button::create('Yes')->value('yes'),
                Button::create('No')->value('no'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                $this->experience = $answer->getValue();
            } else {
                $this->experience = $answer->getText();
            }
            $this->say('Thanks for your application. We will keep in touch!');
            logger('New application: ' . 'Name: ' . $this->firstname . '. Email: ' . $this->email . '. Has Laravel experience: ' . $this->experience);
        });
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askFirstname();
    }
}
