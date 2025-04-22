<?php

use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', function () {
    return view('pages.auth.login');
});

Route::get('/forgot-password', function () {
    return view('pages.auth.forgot-password');
});

Route::get('/', function () {
    return view('pages.dashboard');
});

Route::get('/license', function () {
    return view('pages.license');
});

Route::get('/profile', function () {
    return view('pages.profile');
});

Route::get('/manage-user', function () {
    return view('pages.manage-user');
});

Route::get('/manage-guest',[GuestController::class, 'showGuest'])->name('manage-guest');
Route::post('/manage-guest', [GuestController::class, 'storeGuest'])->name('manage-guest.store');
Route::put('/manage-guest', [GuestController::class, 'updateGuest'])->name('manage-guest.update');
Route::delete('/manage-guest/{id}', [GuestController::class, 'deleteGuest'])->name('manage-guest.destroy');

Route::get('/guest-arrival',[GuestController::class, 'showGuestArrive'])->name('guest-arrival');
Route::get('/guest-category', [GuestController::class, 'getGuestCategory']);
Route::post('/guest-arrival', [GuestController::class, 'storeGuestArrive'])->name('guest-arrival.store');

Route::get('/souvenir-desk', function () {
    return view('pages.souvenir-desk');
});

Route::get('/gift-handling', function () {
    return view('pages.gift-handling');
});

Route::get('/settings', function () {
    return view('pages.settings');
});

Route::get('/event', function () {
    return view('pages.event');
});
