<?php

use App\Http\Controllers\GiftDepositController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\SouvenirController;
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

Route::get('/welcome', function () {
    return view('pages.welcome');
});

Route::get('/gather', function () {
    return view('pages.gather');
});
Route::get('/api/latest-guest', [GuestController::class, 'getUndisplayedGuest']);
Route::get('/api/arrival-guest', [GuestController::class, 'getGuestArrival']);

Route::get('/manage-guest',[GuestController::class, 'showGuest'])->name('manage-guest');
Route::post('/manage-guest', [GuestController::class, 'storeGuest'])->name('manage-guest.store');
Route::put('/manage-guest', [GuestController::class, 'updateGuest'])->name('manage-guest.update');
Route::delete('/manage-guest/{id}', [GuestController::class, 'deleteGuest'])->name('manage-guest.destroy');

Route::get('/guest-arrival',[GuestController::class, 'showGuestArrive'])->name('guest-arrival');
Route::get('/guest-category', [GuestController::class, 'getGuestCategory']);
Route::post('/guest-arrival', [GuestController::class, 'storeGuestArrive'])->name('guest-arrival.store');
Route::post('/guests/upload-photo', [GuestController::class, 'uploadPhoto'])->name('guests.upload-photo');

Route::get('/souvenir-desk', [SouvenirController::class, 'showSouvenirs'])->name('souvenir-desk');
Route::post('/souvenir-desk', [SouvenirController::class, 'storeSouvenirs'])->name('souvenir-desk.store');

Route::get('/gift-handling', [GiftDepositController::class, 'showGiftDeposit'])->name('gift-handling');
Route::post('/gift-handling', [GiftDepositController::class, 'storeGiftDeposit'])->name('gift-handling.store');

Route::get('/settings', function () {
    return view('pages.settings');
});

Route::get('/event', function () {
    return view('pages.event');
});
