<?php

namespace App\Http\Livewire\Courses;

use App\Mail\NewUserMailable;
use App\Mail\SendNotificationMailable;
use App\Mail\WelcomeCourseMailable;
use App\Models\Course;
use App\Models\CourseStudents;
use App\Models\Payment;
//use http\Client\Curl\User;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Http\Controllers\PaypalController;

class Register extends Component
{
    public $listeners = [
        'createNewPay' => 'newPay',
        'successfulPayment' => 'completePurchase'
    ];

    public $course, $step, $auth, $authCheck, $checkEmail;
    public $paymentID, $name, $lastname, $email;

    protected $rules = [
        'name' => 'required',
        'lastname' => 'required',
        'email' => 'required'
    ];

    protected $messages = [
        'name.required' => 'El campo nombre es obligatorio',
        'lastname.required' => 'El campo apellido es obligatorio',
        'email.required' => 'El campo correo electrónico es obligatorio'
    ];

    public function mount($courseID){
            $this->course = Course::find($courseID);
            $this->step = "add-product";
            $this->authCheck = false;
            $this->checkEmail = false;

            if(Auth::check()){
                $this->auth = Auth::user();
                $this->name = $this->getNameUserAuth($this->auth->name);
                $this->lastname = $this->getLastnameUserAuth($this->auth->name);
                $this->email = $this->auth->email;
            }else{
                $this->auth = false;
            }
    }

    public function render()
    {
        return view('livewire.courses.register');
    }

    public function newPay(){
        $this->validate();

        if($this->auth != false OR !$this->checkUserExists($this->email)){
            $payment = Payment::create([
                'product_id' => $this->course->id,
                'method' => 'paypal',
                'name' =>    $this->name,
                'lastname' => $this->lastname,
                'email' => $this->email,
                'status' => 'PENDING',
            ]);

            $this->paymentID = $payment->id;
            $this->dispatchBrowserEvent('goToPay');
            $this->checkEmail = false;
        }else{
            $this->checkEmail = true;
        }
    }

    public function completePurchase($transactionID = NULL){
        //#1 Comprobar que existe una variable de transaccion
        if(!empty($transactionID) OR $transactionID != NULL){
            $payment = Payment::find($this->paymentID);
            $orderDetails = PaypalController::getOrder($transactionID); //#2 Obtenemos los detalles de la orden previamente aprobada por el cliente
            $admins = User::where(['role_id' => 1, 'enabled' => 1])
                ->orWhere(['role_id' => 2, 'enabled' => 1])
                ->get();

            if($orderDetails->result->status == "APPROVED" OR $orderDetails->result->status == "COMPLETED"){ //#3 Si la transaccion es approved procedemos
                if($orderDetails->result->status == "APPROVED"){
                    $capture = PaypalController::captureOrder($transactionID); //#4 Capturamos la transaccion para dar por completado el proceso
                    $orderDetails = PaypalController::getOrder($transactionID); //#5 Obtenemos de nuevo los detalles de la orden previamente capturada
                }

                if($this->auth != false) $user = $this->auth;

                $payment->update([  //#6 Actualizamos los datos del pago en la base de datos
                    'product_id' =>$this->course->id,
                    'name' => $this->name,
                    'lastname' => $this->lastname,
                    'email' => $this->email,
                    'status' => $orderDetails->result->status,
                    'user_id' => ($this->auth != false) ? $user->id : NULL,
                    'transaction_id' => $transactionID,
                    'transaction_status' => $orderDetails->result->status,
                    'payer_id' => $orderDetails->result->payer->payer_id,
                    'payer_email' => $orderDetails->result->payer->email_address,
                    'payer_name' => $orderDetails->result->payer->name->given_name . ' ' . $orderDetails->result->payer->name->surname,
                    'payer_country_code' => $orderDetails->result->payer->address->country_code,
                    'payment_create_time' => $orderDetails->result->create_time,
                    'payment_amount_value' => $orderDetails->result->purchase_units[0]->amount->value,
                    'payment_currency_code' => $orderDetails->result->purchase_units[0]->amount->currency_code
                ]);

                if($orderDetails->result->status == "COMPLETED"){ //#7 Si la orden es completada -- transacción finalizada
                    if($this->auth != false){
                        $user = $this->auth; //#8 Si el usuario está logueado obtenemos sus datos
                    }else{ //#9 Si el usuario no está logueado procedemos a verificar que no exista
                        if(!$this->checkUserExists($this->email)){ //#10 si no existe procedemos a crearle una cuenta
                            $password = Str::random(12);
                            $user = User::create([
                                'name' =>    $this->name . ' ' . $this->lastname,
                                'email' => $this->email,
                                'password' => $password,
                                'role_id' => 5, // Role 5 = Student
                            ]);
                            $user->passwordtxt = $password;
                        }else{ //#11 si existe mostramos un error de "usuario existente" para que se logue o escoga otros datos de usuario.
                            $this->checkEmail = true;
                            return false;
                        }
                    }

                    $payment->update(['user_id' => $user->id]); //#12 Actualizamos el usuario en el pago para vincularlos

                    $enrollment = CourseStudents::create([
                        'course_id' => $this->course->id,
                        'user_id' => $user->id,
                        'active' => 1
                    ]); //#13 Enrolamos al usuario con el curso adquirido

                    if($this->auth != false){ //#14 Si el usuario está logueado envíamos unicamente correo de bienvenida al curso
                        $welcomeCourseEmail = new WelcomeCourseMailable($user, $this->course);
                        Mail::to($this->email)->send($welcomeCourseEmail);
                    }else{ //#15 si no, enviamos correo con datos de acceso a la plataforma y otro correo de bienvenida al curso
                        $newUserEmail = new NewUserMailable($user);
                        $welcomeCourseEmail = new WelcomeCourseMailable($user, $this->course);

                        //Mail::to($this->email)->send($newUserEmail);
                        Mail::to($this->email)->send($welcomeCourseEmail);
                    }

                    $notification = new \stdClass(); //#16 Creamos el contenido del correo que se enviará a los adminitrados para notificar de la nueva compra
                    $notification->message = $user->name . ' (' . $user->email . ') ha realizado una nueva compra del curso' . ' <strong>"'. $this->course->title .'"</strong>';
                    $notification->message .= ' los datos de la compra ya se encuentran disponibles en la plataforma de administración.';
                    $notification->link = "https://cursos.liderazgoefectivo.info/pagos/detalles/".$payment->id;
                    $notification->link_label = "Ir a la plataforma";

                    foreach ($admins as $admin){ //#17 Enviamos el correo a los admins
                        $notification->title = "Hola " . $admin->name . ",";
                        $notificationEmail = new SendNotificationMailable($notification);

                        Mail::to($admin->email)->send($notificationEmail);
                    }
                }else{
                    // AQU+I DEBE IR UNA EXCEPCIÓN PARA MOSTRAR QUE LA TRASACCIÓN NO HA SIDO COMPLETADO PERO SI APROBADA.
                }
            }else{
                // AQUÍ DEBE IR UNA EXCEPCIÓN PARA MOSTRAR QUE LA TRANSACCIÓN NO HA SIDO APROBADA.
            }
        }
    }

    public function  updatePayment($id){
        $payment = Payment::find($id);
    }

    public function changeStep($step){
        $this->step = $step;
    }

    public function getAuthInfo(){
        $this->name = $this->auth->name;
        $this->email = $this->auth->email;
        $this->authCheck = true;
    }

    public function getNameUserAuth($name){
        $result = "";
        $splitName = explode(" ", $name);
        $n = count($splitName);

        switch($n){
            case 0:
                return false;
            case 1:
            case 2:
            case 3:
                return $splitName[0];
            case 4:
                return $splitName[0]." ".$splitName[1];
            case 5:
                return $splitName[0]." ".$splitName[1]." ".$splitName[2];
            case 6:
                return $splitName[0]." ".$splitName[1]." ".$splitName[2]." ".$splitName[3];
        }
    }

    public function getLastnameUserAuth($name){
        $result = "";
        $splitName = explode(" ", $name);
        $n = count($splitName);

        switch($n){
            case 0:
            case 1:
                return "";
            case 2:
                return $splitName[1];
            case 3:
                return $splitName[1]." ".$splitName[2];
            case 4:
                return $splitName[2]." ".$splitName[3];
            case 5:
                return $splitName[3]." ".$splitName[4];
            case 6:
                return $splitName[4]." ".$splitName[5];
        }
    }

    public function checkUserExists($email){
        $user = User::where('email', $email)->get();


        if(count($user) > 0){
            return true;
        }else{
            return false;
        }
    }

    public function logout(){
        Auth::logout();
        $this->auth = false;
        $this->name = "";
        $this->lastname = "";
        $this->email = "";
    }
}
