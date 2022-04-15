<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Mail\EventReminder;
use App\Mail\MessageToProspectsMailable;
use App\Models\Event;
use App\Models\EventDates;
use App\Models\EventRegistration;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{
    public function index()
    {
        $data = [
            'category_name' => 'events',
            'page_name' => 'manage_events',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0
        ];

        return view('events.index')->with($data);
    }

    public function create(){
        $data = [
            'category_name' => 'events',
            'page_name' => 'add_event',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0
        ];

        return view('events.create')->with($data);
    }

    public function edit($id){
        $data = [
            'category_name' => 'events',
            'page_name' => 'edit_event',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
            'event_id' => $id
        ];

        return view('events.edit')->with($data);
    }

    public function details($id){

        $event = Event::findOrFail($id);

        $data = [
            'category_name' => 'events',
            'page_name' => 'event_details',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
            'event' => $event,
            'months' => Helper::getMonthsInES()
        ];

        return view('events.details')->with($data);
    }

    public function eventDateProspects($date_id){
        $eventDate = EventDates::findOrFail($date_id);
        $event = Event::findOrFail($eventDate->event_id);
        $prospects = EventRegistration::where("event_date_id", $eventDate->id)->orderBy('id', 'desc')->get();

        $data = [
            'category_name' => 'events',
            'page_name' => 'event_prospects',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
            'event' => $event,
            'event_date' => $eventDate,
            'prospects' => $prospects,
            'months' => Helper::getMonthsInES()
        ];

        return view('events.prospects')->with($data);
    }

    public function sendEventReminder($event_date_id){
        $admins = User::where("role_id", 1)->get();
        $eventDate = EventDates::findOrFail($event_date_id);
        $event = Event::findOrFail($eventDate->event_id);
        $result = new \stdClass();
        $result->response = false;
        $startEvent = new Carbon($eventDate->start_datetime);
        $today = Carbon::now();

        if($startEvent->diffInDays($today) >= 0){
            if(!empty($event->url) AND !empty($eventDate->start_datetime)){
                $prospects = EventRegistration::where("event_id", $event->id)->get();

                if(count($prospects) >= 0){
                    $counter = 0;

                    $eventDate->diffInDays = $startEvent->diffInDays($today);
                    foreach($prospects as $prospect){
                        $reminderEmail = new EventReminder($prospect, $eventDate);
                        Mail::to($prospect->email)->send($reminderEmail);

                        $counter++;
                    }

                    $result->response = true;
                }else{
                    $result->response = "ERROR-PROSPECTS";
                }
            }else{
                $result->response = "ERROR-DATA";
            }
        }else{
            $result->response = "ERROR-PAST-EVENT";
        }

        echo json_encode($result);

    }

    public function editMessageToProspects($date_id){
        $eventDate = EventDates::findOrFail($date_id);
        $event = Event::findOrFail($eventDate->event_id);
        $prospects = EventRegistration::where("event_date_id", $eventDate->id)->orderBy('id', 'desc')->get();

        $data = [
            'category_name' => 'events',
            'page_name' => 'edit_message_prospects',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
            'event' => $event,
            'event_date' => $eventDate,
            'prospects' => $prospects,
            'months' => Helper::getMonthsInES()
        ];

        return view('events.edit-message-prospects')->with($data);
    }

    public function sendMessageToProspects(Request $request){
        $eventDate = EventDates::findOrFail($request->id);
        $event = Event::findOrFail($eventDate->event_id);
        $result = new \stdClass();
        $result->response = false;

        $data = array();
        parse_str($request->data, $data);

        $prospects = EventRegistration::where("event_id", $event->id)->get();

        if(!empty($data['message-title']) AND !empty($data['message-content'])){
            if(count($prospects) >= 0){
                $counter = 0;

                foreach($prospects as $prospect){
                    $messageTemplate = new MessageToProspectsMailable($data['message-title'], $data['message-content']);
                    Mail::to($prospect->email)->send($messageTemplate);
                    $counter++;
                }

                $result->response = true;
            }else{
                $result->response = "ERROR-PROSPECTS";
            }
        }else{
            $result->response = "ERROR-DATA";
        }

        echo json_encode($result);
    }
}
