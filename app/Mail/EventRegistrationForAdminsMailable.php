<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventRegistrationForAdminsMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "Nuevo registro para un evento";
    public $prospectData;
    public $eventData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($prospectData, $eventData)
    {
        $this->prospectData = $prospectData;
        $this->eventData = $eventData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.event-registration-for-admins-2');
    }
}
