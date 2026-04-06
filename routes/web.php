<?php

use App\Http\Controllers\admin\AppointmentController as AdminAppointmentController;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\DoctorController;
use App\Http\Controllers\admin\PatientController;
use App\Http\Controllers\ConversationController as ControllersConversationController;
use App\Http\Controllers\Doctor\AppointmentController;
use App\Http\Controllers\Doctor\AuthController as DoctorAuthController;
use App\Http\Controllers\Doctor\AvailableTimingController;
use App\Http\Controllers\Doctor\ConversationController;
use App\Http\Controllers\Doctor\DashboardController;
use App\Http\Controllers\Doctor\DoctorStripeController;
use App\Http\Controllers\Patient\AppointmentController as PatientAppointmentController;
use App\Http\Controllers\Patient\AuthController;
use App\Http\Controllers\Patient\ConversationController as PatientConversationController;
use App\Http\Controllers\Patient\DashboardController as PatientDashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebController;
use App\Models\AvailableTiming;
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

Route::get('/', [WebController::class, 'index']);
Route::get('/dummy', [ControllersConversationController::class, 'registerQuickBlox']);
Route::get('about-us', [WebController::class, 'aboutUs'])->name('about-us');
Route::get('doctors', [WebController::class, 'doctors'])->name('doctors');
Route::get('doctors/{username}', [WebController::class, 'doctorDetails'])->name('doctor.details');
Route::get('faqs', [WebController::class, 'faqs'])->name('faqs');
Route::get('contact-us', [WebController::class, 'contactUs'])->name('contact-us');
Route::get('privacy-policy', [WebController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('terms-and-conditions', [WebController::class, 'termsAndConditions'])->name('terms-and-conditions');
Route::get('get-doctors', [WebController::class, 'getDoctors'])->name('get-doctors');
Route::get('get-slots', [WebController::class, 'getSlots'])->name('get-slots');


Route::middleware(['auth', 'role:doctor'])->group(function () {
    Route::get('doctor/dashboard', [DashboardController::class, 'index'])->name('doctor.dashboard');
    Route::get('doctor/appointments', [AppointmentController::class, 'index'])->name('doctor.appointment.index');
    Route::get('doctor/appointments/get', [AppointmentController::class, 'get'])->name('doctor.appointment.get');
    Route::get('doctor/appointments/{appointment}/show', [AppointmentController::class, 'show'])->name('doctor.appointment.show');
    Route::post('doctor/appointments/{appointment}', [AppointmentController::class, 'start'])->name('doctor.appointment.start');
    Route::put('doctor/appointment-fees', [AppointmentController::class, 'updateAppointmentFees'])->name('doctor.appointment.update-fee');

    Route::get('doctor/conversation/{conversation}', [ConversationController::class, 'index'])->name('doctor.conversation.index');

    Route::get('doctor/available-timings', [AvailableTimingController::class, 'index'])->name('doctor.available-timings.index');
    Route::get('doctor/available-timings/get', [AvailableTimingController::class, 'get'])->name('doctor.available-timings.get');
    Route::post('doctor/available-timings', [AvailableTimingController::class, 'store'])->name('doctor.available-timings.store');
    Route::delete('doctor/available-timings', [AvailableTimingController::class, 'destroy'])->name('doctor.available-timings.destroy');



    Route::get('doctor/profile-settings', [DashboardController::class, 'profileSettings'])->name('doctor.profile-settings.index');
    Route::put('doctor/update-profile', [DashboardController::class, 'updateProfile'])->name('doctor.update-profile');

    Route::get('doctor/patients', [DashboardController::class, 'patients'])->name('doctor.patients.index');
    Route::get('doctor/reviews', [DashboardController::class, 'reviews'])->name('doctor.reviews.index');

    Route::get('/stripe/setup', [DoctorStripeController::class, 'setupStripe'])->name('doctor.stripe.setup');
    Route::get('/stripe/return', [DoctorStripeController::class, 'stripeReturn'])->name('doctor.stripe.return');
    Route::get('/stripe/refresh', [DoctorStripeController::class, 'stripeRefresh'])->name('doctor.stripe.refresh');
    Route::get('/stripe/dashboard', [DoctorStripeController::class, 'dashboard'])->name('doctor.stripe.dashboard');
});


Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('doctors/{username}/book-appointment', [WebController::class, 'bookAppointment'])->name('patient.book-appointment');
    Route::post('patient/appointments/{doctor}', [PatientAppointmentController::class, 'store'])->name('patient.appointment.store');


    Route::get('patient/dashboard', [PatientDashboardController::class, 'index'])->name('patient.dashboard');
    Route::get('patient/profile-settings', [PatientDashboardController::class, 'profileSettings'])->name('patient.profile-settings.index');
    Route::put('patient/update-profile', [PatientDashboardController::class, 'updateProfile'])->name('patient.update-profile');

    Route::get('patient/appointments', [PatientAppointmentController::class, 'index'])->name('patient.appointment.index');
    Route::get('patient/appointments/get', [PatientAppointmentController::class, 'get'])->name('patient.appointment.get');
    Route::get('patient/appointments/{appointment}/show', [PatientAppointmentController::class, 'show'])->name('patient.appointment.show');
    Route::put('patient/appointments/{appointment}/add-review', [PatientConversationController::class, 'addReview'])->name('patient.appointment.add-review');

    Route::get('patient/conversation/{conversation}', [PatientConversationController::class, 'index'])->name('patient.conversation.index');
    Route::get('patient/conversation', [PatientConversationController::class, 'get'])->name('patient.conversation.get');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('index');
    Route::get('/patients', [PatientController::class, 'index'])->name('patient.index');
    Route::get('/doctors', [DoctorController::class, 'index'])->name('doctor.index');
    Route::get('/appointments', [AdminAppointmentController::class, 'index'])->name('appointment.index');
});


Route::post('send-message', [ControllersConversationController::class, 'sendMessge'])->name('send-message');
Route::get('get-messages', [ControllersConversationController::class, 'getMessages'])->name('get-messages');
// Route::get('send-message', [ControllersConversationController::class, 'sendMessge'])->name('send-message');


Route::middleware(['guest'])->group(function () {
    Route::get('patient/login', [AuthController::class, 'login'])->name('patient.login');
    Route::post('patient/signin', [AuthController::class, 'signin'])->name('patient.signin');
    Route::get('patient/register', [AuthController::class, 'register'])->name('patient.register');
    Route::post('patient/signup', [AuthController::class, 'signup'])->name('patient.signup');


    Route::get('doctor/login', [DoctorAuthController::class, 'login'])->name('doctor.login');
    Route::post('doctor/signin', [DoctorAuthController::class, 'signin'])->name('doctor.signin');
    Route::get('doctor/register', [DoctorAuthController::class, 'register'])->name('doctor.register');
    Route::post('doctor/signup', [DoctorAuthController::class, 'signup'])->name('doctor.signup');
});


Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/video-call', [App\Http\Controllers\VideoCallController::class, 'index']);
Route::post('/generate-agora-token', [App\Http\Controllers\VideoCallController::class, 'generateToken']);

require __DIR__ . '/auth.php';
