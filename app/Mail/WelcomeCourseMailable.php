<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeCourseMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "Bienvenido al curso - Liderazgo Efectivo";
    public $user, $course;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $course)
    {
        $this->user = $user;
        $this->course = $course;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.welcome-course');
    }
}
