<?php

use App\Models\Event;
use App\Models\EventDates;
use App\Models\EventRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventRegistrationController;
use App\Mail\EventRegistrationMailable;
use App\Mail\EventRegistrationForAdminsMailable;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::post('eventos/registro', [EventRegistrationController::class, 'store']);

Route::post('eventos/registro', function(Request $request) {
    $params = array();
    parse_str($_POST['data'], $params);

    $eventRegistration = new EventRegistration();
    $eventRegistration->name = $params['fullname'];
    $eventRegistration->age = $params['age'];
    $eventRegistration->employment = $params['employment'];
    $eventRegistration->email = $params['email'];
    $eventRegistration->cellphone_number = $params['cellphone'];
    $eventRegistration->city = $params['city'];
    $eventRegistration->state = $params['state'];
    $eventRegistration->country = $params['country'];

    $eventData = Event::where('key_name', $params['event-name'])->first();

    if(!empty($eventData) AND $eventData !== NULL){
        $eventData->date = EventDates::where('event_id', $eventData->id)->first();
        $eventRegistration->event_id = $eventData->id;

        if($eventRegistration->save()){
            $usermail = new EventRegistrationMailable($eventRegistration, $eventData);;
            $adminmail = new EventRegistrationForAdminsMailable($eventRegistration, $eventData);

            Mail::to($eventRegistration->email)->send($usermail);
            Mail::to("cruzcaceres@hotmail.com")->cc("darwincruz01@gmail.com")->send($adminmail);

            $status = true;
            $title = "¡Gracias por registrarte!";
            $message = "Te hemos registrado a nuestro evento: <strong>" . $eventData->name . '</strong> de forma éxitosa, te haremos llegar los detalles al siguiente correo electrónico <strong>'.$eventRegistration->email.'</strong>.' ;
        }else{
            $status = false;
            $title = "¡Error!";
            $message = "Hemos tenido problemas al almacenar tus datos, por favor, intenta de nuevo.";
        }
    }else{
        $status = false;
        $title = "¡Error!";
        $message = "El evento que seleccionaste no existe o ya no está disponible. :(";
    }

    return response()->json([
        "status" => $status,
        "title" => $title,
        "message" => $message
            ], 201);
});

