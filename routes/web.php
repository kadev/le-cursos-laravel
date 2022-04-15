<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProspectController;
use App\Http\Controllers\SystemOptionsController;
use App\Http\Controllers\UserController;
use App\Mail\EventRegistrationMailable;
use App\Mail\EventRegistrationForAdminsMailable;
use App\Models\Event;
use App\Models\EventDates;
use App\Models\EventRegistration;
use App\Models\UnitClasses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'auth'] , function() {
    Route::get('/dashboard', function() {
        // $category_name = '';
        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'sales',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];
        // $pageName = 'sales';

        if(Auth::user()->role_id == 5){
            return redirect()->route("courses");
        }else{
            return view('dashboard')->with($data);
        }
    })->name('dashboard');

    // Authentication
    Route::prefix('authentication')->group(function () {
        Route::get('/lockscreen_boxed', function() {
            // $category_name = 'auth';
            $data = [
                'category_name' => 'auth',
                'page_name' => 'auth_boxed',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',
                'alt_menu' => 0,
            ];
            // $pageName = 'auth_boxed';
            return view('pages.authentication.auth_lockscreen_boxed')->with($data);
        });
        Route::get('/lockscreen', function() {
            // $category_name = 'auth';
            $data = [
                'category_name' => 'auth',
                'page_name' => 'auth_default',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',
                'alt_menu' => 0,
            ];
            // $pageName = 'auth_default';
            return view('pages.authentication.auth_lockscreen')->with($data);
        });
        Route::get('/login_boxed', function() {
            // $category_name = 'auth';
            $data = [
                'category_name' => 'auth',
                'page_name' => 'auth_boxed',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',
                'alt_menu' => 0,
            ];
            // $pageName = 'auth_boxed';
            return view('pages.authentication.auth_login_boxed')->with($data);
        });
        Route::get('/login', function() {
            // $category_name = 'auth';
            $data = [
                'category_name' => 'auth',
                'page_name' => 'auth_default',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',
                'alt_menu' => 0,
            ];
            // $pageName = 'auth_default';
            return view('pages.authentication.auth_login')->with($data);
        });
        Route::get('/pass_recovery_boxed', function() {
            // $category_name = 'auth';
            $data = [
                'category_name' => 'auth',
                'page_name' => 'auth_boxed',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',
                'alt_menu' => 0,
            ];
            // $pageName = 'auth_boxed';
            return view('pages.authentication.auth_pass_recovery_boxed')->with($data);
        });
        Route::get('/pass_recovery', function() {
            // $category_name = 'auth';
            $data = [
                'category_name' => 'auth',
                'page_name' => 'auth_default',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',
                'alt_menu' => 0,
            ];
            // $pageName = 'auth_default';
            return view('pages.authentication.auth_pass_recovery')->with($data);
        });
        Route::get('/register_boxed', function() {
            // $category_name = 'auth';
            $data = [
                'category_name' => 'auth',
                'page_name' => 'auth_boxed',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',
                'alt_menu' => 0,
            ];
            // $pageName = 'auth_boxed';
            return view('pages.authentication.auth_register_boxed')->with($data);
        });
        Route::get('/register', function() {
            // $category_name = 'auth';
            $data = [
                'category_name' => 'auth',
                'page_name' => 'auth_default',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',
                'alt_menu' => 0,
            ];
            // $pageName = 'auth_default';
            return view('pages.authentication.auth_register')->with($data);
        });
    });


    // Users
    Route::prefix('users')->group(function () {
        Route::get('/account_settings', function() {
            // $category_name = '';
            $data = [
                'category_name' => 'users',
                'page_name' => 'account_settings',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',
                'alt_menu' => 0,

            ];
            // $pageName = 'account_settings';
            return view('pages.users.user_account_setting')->with($data);
        });
    });

    //Prospects

    Route::prefix('prospectos')->group(function () {
        Route::get('/', [ProspectController::class, 'index'])->name('prospects');
        Route::get('/agregar', [ProspectController::class, 'create'])->name('create-prospect');
        Route::get('/editar/{id}', [ProspectController::class, 'edit'])->name('update-prospect');
    });

    //Users

    Route::prefix('usuarios')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users');
        Route::get('/agregar', [UserController::class, 'create'])->name('create-user');
        Route::get('/editar/{id}', [UserController::class, 'edit'])->name('update-user');
        Route::get('editar-contrasena/{id}', [UserController::class, 'changePassword'])->name('change-password');
    });

    Route::prefix('perfil')->group(function () {
        Route::get('/', [UserController::class, 'profile'])->name('profile');
        Route::get('/editar', [UserController::class, 'editProfile'])->name('update-profile');
    });

    //Events

    Route::get('/eventos', [EventController::class, 'index'])->name('events');
    Route::get('/eventos/detalles/{id}', [EventController::class, 'details'])->name('event-details');
    Route::get('/eventos/agregar', [EventController::class, 'create'])->name('create-event');
    Route::get('/eventos/editar/{id}', [EventController::class, 'edit'])->name('update-event');
    Route::get('/eventos/prospectos/{date}', [EventController::class, 'eventDateProspects'])->name('event-date-prospects');
    Route::get('/eventos/prospectos/enviar-recordatorios/{date}', [EventController::class, 'sendEventReminder'])->name('send-reminder-event');
    Route::get('/eventos/prospectos/enviar-mensaje/{date}', [EventController::class, 'editMessageToProspects'])->name('edit-message-prospects');
    Route::post('/eventos/prospectos/enviar-mensaje', [EventController::class, 'sendMessageToProspects'])->name('send-message-prospects');

    //Courses

    Route::prefix('cursos')->group(function () {
        Route::get('/', [CourseController::class, 'index'])->name('courses');
        Route::get('/agregar', [CourseController::class, 'create'])->name('create-course');
        Route::get('/editar/{id}', [CourseController::class, 'edit'])->name('update-course');
        Route::get('/detalles/{id}', [CourseController::class, 'show'])->name('course-details');
        Route::get('/clase/configurar/{id}', [CourseController::class, 'config_class'])->name('config-class');

    });

    //Links

    Route::prefix('links')->group(function () {
        Route::get('/', [LinkController::class, 'index'])->name('links');
    });

    //Pagos

    Route::prefix('pagos')->group(function () {
        Route::get('/', [PaymentController::class, 'index'])->name('payments');
    });

    //System Options
    Route::get('/system/options', [SystemOptionsController::class, 'index'])->name('system-options');
});


// STUDENT ROUTES
Route::group(['middleware' => 'auth'] , function() {
    //Courses
    Route::prefix('cursos')->group(function () {
        Route::get('/', [CourseController::class, 'index'])->name('courses');
        Route::get('/agregar', [CourseController::class, 'create'])->name('create-course');
        Route::get('/editar/{id}', [CourseController::class, 'edit'])->name('update-course');
        Route::get('/detalles/{id}', [CourseController::class, 'details'])->name('course-details');
        Route::get('/ver/{key_name}/{class_id?}', [CourseController::class, 'show'])->name('see-course');

    });
});


//AUTH ROUTES
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/404', 'HomeController@error404')->name('404');

Route::get('/register', function() {
    return redirect('/login');
});

Route::get('/password/reset', function() {
    return redirect('/login');
    //return view('auth.passwords.reset');
})->name('password.request');

Route::get('/', function() {
    return redirect('/dashboard');
})->name('home');

Route::get('/eventos/registro/{evento}', [ProspectController::class, 'newRegister'])->name('new-register');
Route::get('/comprar/{course}', [CourseController::class, 'buy'])->name('buy-course');
Route::get('/redirect/{key_name}', [LinkController::class, 'redirectLink'])->name('redirect-link');
