<?php

namespace App\Mail;

use App\Helpers\Helper;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventRegistrationMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "Registro éxitoso";
    public $prospectData;
    public $eventData, $months;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($prospectData, $eventData)
    {
        $this->prospectData = $prospectData;
        $this->eventData = $eventData;
        $this->months = Helper::getMonthsInES();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.event-registration-2');
    }
}
