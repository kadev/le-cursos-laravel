<?php

namespace App\Console\Commands;

use App\Mail\EventReminder;
use App\Mail\SendNotificationMailable;
use App\Models\Event;
use App\Models\EventDates;
use App\Models\EventRegistration;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class RememberEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remember:events';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enviar correos de recordatorio a todos los usuarios registrados a los eventos del día.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $admins = User::where("role_id", 1)->get();
        $events = Event::all();

        foreach ($events as $event){
            $dates = EventDates::where("event_id", $event->id)->get();

            if(empty($event->url)){
                $notification = new \stdClass();
                $notification->message = 'Hemos detectado que el evento' . ' <strong>"'. $event->name .'"</strong>';
                $notification->message .= ' no cuenta con una URL, no hemos enviado el correo electrónico de recordatorio
                                            a todos los participantes por seguridad, por favor ingresa la URL desde el portal
                                            de administración de eventos y ejecuta el envío de recordatorios manualmente.';
                $notification->link = "https://cursos.liderazgoefectivo.info/eventos/detalles/".$event->id;
                $notification->link_label = "Ir al portal";

                foreach ($admins as $admin){
                    $notification->title = "Hola " . $admin->name . ",";
                    $notificationEmail = new SendNotificationMailable($notification);

                    Mail::to($admin->email)->send($notificationEmail);
                }

                return 0;
            }

            foreach ($dates as $date){

                if(empty($date->start_datetime)) return 0;

                $startEvent = new Carbon($date->start_datetime);
                if($startEvent->isToday()){
                    $prospects = EventRegistration::where("event_id", $event->id)->get();
                    $counter = 0;

                    if(count($prospects) == 0){
                        $notification = new \stdClass();
                        $notification->message = 'Lamentamos informarle que el evento' . ' <strong>"'. $event->name .'"</strong>';
                        $notification->message .= ' no ha tenido registro de prospectos, por lo que no hemos enviado correos electrónicos de recordatorio. ';

                        foreach ($admins as $admin){
                            $notification->title = "Hola " . $admin->name . ",";
                            $notificationEmail = new SendNotificationMailable($notification);

                            Mail::to($admin->email)->send($notificationEmail);
                        }

                        return 0;
                    }

                    foreach($prospects as $prospect){
                        $reminderEmail = new EventReminder($prospect, $date);
                        Mail::to($prospect->email)->send($reminderEmail);

                        $counter++;
                      }

                    $event->prospectsCounter = $counter;

                    $notification = new \stdClass();
                    $notification->message = 'Hemos enviado  de forma exitosa <strong>' . $counter . '</strong> recordatorios para el evento <strong>"'. $event->name .'"</strong>.';
                    $notification->message .= '';

                    foreach ($admins as $admin){
                        $notification->title = "Hola " . $admin->name . ",";
                        $notificationEmail = new SendNotificationMailable($notification);

                        Mail::to($admin->email)->send($notificationEmail);
                    }
                }
            }
        }

        return 0;
    }
}

//https://cvallejo.medium.com/cronjobs-laravel-585017b32862
//https://laravel.com/docs/8.x/scheduling
//https://beefree.io
//http://rapigo.com.mx/email_html/templates/mobile-basicmobile.html
