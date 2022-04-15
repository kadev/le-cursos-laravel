<?php

namespace App\Mail;

use App\Helpers\Helper;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventReminder extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "Recordatorio: ";
    public $prospect, $date, $months;
    public $eventData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($prospectData, $date)
    {
        $this->subject .= $prospectData->event->name;
        $this->prospect = $prospectData;
        $this->date = $date;
        $this->months = Helper::getMonthsInES();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.event-reminder');
    }
}
