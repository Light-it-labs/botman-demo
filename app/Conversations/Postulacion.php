<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class Postulacion extends Conversation
{

    protected $firstname;
    protected $email;
    protected $experience;

    public function askFirstname()
    {
        $this->say('Que buena noticia!');
        $this->ask('Cuál es tu nombre?', function(Answer $answer){
            $this->firstname = $answer->getText();

            $this->say('Mucho gusto '. $this->firstname);
            $this->askEmail();
        });
    }

    public function askEmail()
    {
        $this->ask('A qué mail te gustaría que nos comuniquemos?', function(Answer $answer) {
            $this->email = $answer->getText();

            $this->askExperience();
        });
    }

    /**
     * First question
     */
    public function askExperience()
    {
        $this->say('Última pregunta');
        $question = Question::create("Tenes experiencia en Laravel?")
            ->callbackId('ask_experience')
            ->addButtons([
                Button::create('Si')->value('si'),
                Button::create('No')->value('no'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                $this->experience = $answer->getValue();
            } else {
                $this->experience = $answer->getText();
            }
            $this->say('Muchas gracias por postularte. Estaremos en contacto!');
            logger('Nuevo registro: ' . 'Nombre: ' . $this->firstname . '. Email: ' . $this->email . '. Tiene experiencia: ' . $this->experience);
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
