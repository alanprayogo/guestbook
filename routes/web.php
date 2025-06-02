<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SouvenirController;
use App\Http\Controllers\GiftDepositController;

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

route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
route::post('/login', [AuthController::class, 'login']);
route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/forgot-password', function () {
    return view('pages.auth.forgot-password');
});

Route::get('/',[SettingController::class, 'showDashboard'])->name('dashboard')->middleware('auth');

Route::get('/license', function () {
    return view('pages.license');
});

Route::get('/profile', function () {
    return view('pages.profile');
});

Route::get('/manage-user',[UserController::class, 'showUser'])->name('manage-user');
Route::post('/manage-user', [UserController::class, 'storeUser'])->name('user.store');
// Route::put('/manage-user', [UserController::class, 'updateUser'])->name('manage-user.update');
Route::delete('/manage-user/{id}', [UserController::class, 'deleteUser'])->name('manage-user.destroy');

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
Route::get('guest/export-excel', [GuestController::class, 'exportGuest'])->name('exportGuest');

Route::get('/guest-arrival',[GuestController::class, 'showGuestArrive'])->name('guest-arrival');
Route::get('/guest-category', [GuestController::class, 'getGuestCategory']);
Route::post('/guest-arrival', [GuestController::class, 'storeGuestArrive'])->name('guest-arrival.store');
Route::post('/guests/upload-photo', [GuestController::class, 'uploadPhoto'])->name('guests.upload-photo');
Route::get('arrival/export-excel', [GuestController::class, 'exportArrival'])->name('exportArrival');

Route::get('/souvenir-desk', [SouvenirController::class, 'showSouvenirs'])->name('souvenir-desk');
Route::post('/souvenir-desk', [SouvenirController::class, 'storeSouvenirs'])->name('souvenir-desk.store');

Route::get('/gift-handling', [GiftDepositController::class, 'showGiftDeposit'])->name('gift-handling');
Route::post('/gift-handling', [GiftDepositController::class, 'storeGiftDeposit'])->name('gift-handling.store');
Route::post('gift-handling/note', [GiftDepositController::class, 'storeNote'])->name('gift-handling.note');

Route::get('/settings', [SettingController::class, 'showSettings'])->name('settings');
Route::post('/settings', [SettingController::class, 'storeSettings'])->name('settings.store');

Route::get('/event', [SettingController::class, 'showCategories'])->name('event');
Route::post('/event', [SettingController::class, 'storeCategory'])->name('event.store');
