<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Event;
use App\Models\EventDates;
use App\Models\EventRegistration;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProspectController extends Controller
{
    public function index()
    {
        $data = [
            'category_name' => 'prospects',
            'page_name' => 'manage_prospects',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
            'events' => Event::where('enabled', 1)->get(),
            'prospects' => EventRegistration::all()
        ];

        return view('prospects.index')->with($data);
    }

    public function show($id)
    {
        return view('prospects.details', [
            'prospect' => EventRegistration::findOrFail($id)
        ]);
    }

    public function create(){
        $data = [
            'category_name' => 'prospects',
            'page_name' => 'add_prospect',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0
        ];

        return view('prospects.create')->with($data);
    }

    public function newRegister($key){
        $event = Event::where('key_name', $key)->first();
        //$nextDate = $event->eventDates->first();

        if($event->enabled == 0){
            return redirect()->route("404");
        }

        if(empty($event)){
            return abort(404);
        }

        $allDates = $event->eventDates;
        $nextDate = $this->getNextDate($allDates);

        //dd($allDates, $nextDate);
        $data = [
            'category_name' => 'frontend',
            'page_name' => 'new_register',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
            'event' => $event,
            'nextDate' => $nextDate,
            'allDates' => $allDates,
            'months' => Helper::getMonthsInES()
        ];

        return view('frontend.register')->with($data);
    }

    public function edit($id){
        $data = [
            'category_name' => 'prospects',
            'page_name' => 'edit_prospect',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
            'prospect_id' => $id
        ];

        return view('prospects.edit')->with($data);
    }

    private function getNextDate($dates){
        $availableDates = array();
        $result = false;

        foreach ($dates as $date){
            $startDatetime = new Carbon($date->start_datetime);

            if(!$startDatetime->isPast()){
                array_push($availableDates, $date);
            }
        }

        if(count($availableDates) > 0){
            $helper = false;
            foreach ($availableDates as $date){
                $hdate = new Carbon($date->start_datetime);
                if($helper == false){
                    $helper = $hdate;
                    $result = $date;
                }else{
                    if($hdate->lessThan($helper)){
                        $helper = $hdate;
                        $result = $date;
                    }
                }
            }

            return $result;
        }else{
            return false;
        }
        //comprobar que la fecha aún no haya pasado
        //regresar la fecha más cerca a la fecha de hoy (Si no hay cupo, devolver la siguiente fecha próxima).
    }
}
