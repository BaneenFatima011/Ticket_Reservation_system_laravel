<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CredentialController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\CountryController;

use App\Http\Controllers\TransportController;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\FeedbackController;
use App\Models\routes;


Route::get('/', function () {
    return view('ticket.tickets');
});

Route::get('/login', [CredentialController::class, 'login']);
Route::get('/register', [CredentialController::class, 'registration']);
Route::post('/register-user',[PassengerController::class, 'registerUser' ])->name('register-user');
Route::post('/login-user',[CredentialController::class, 'loginUser'])->name('login-user');
Route::get('/dashboard',[CredentialController::class, 'dashboard']);
Route::get('/dashboardadmin',[CredentialController::class, 'dashboardadmin']);
Route::get('/logout',[CredentialController::class, 'logout']);
Route::resource("/transport", TransportController::class);
Route::resource("/location", CountryController::class);

Route::get('/search', [SearchController::class, 'index'])->name('search.index');
Route::resource("/schedule", RoutesController::class);
Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
Route::get('/reservation', [ReservationController::class, 'index2'])->name('reservationAdmin.index2');
Route::get('/booking', [ReservationController::class, 'display'])->name('Booking.display');
Route::post('/schedules', [RoutesController::class, 'store'])->name('schedules.store');
Route::post('/seats',[ReservationController::class,'store'])->name('reservations.store');
Route::post('/reservations',[ReservationController::class,'add'])->name('reservations.add');
Route::post('/countries', [CountryController::class, 'store'])->name('countries.store');

// Route for creating a city
Route::post('/cities', [CountryController::class, 'store'])->name('cities.store');

Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');
Route::get('/print/{id}', [PaymentController::class, 'print'])->name('payment.print');
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
Route::post('/feedbacks', [FeedbackController::class, 'add'])->name('feedback.add');
Route::get('/ticket', [ReservationController::class, 'showTickets'])->name('ticket.showTickets');