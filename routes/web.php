<?php

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

Route::get('/manage-guest', function () {
    return view('pages.manage-guest');
});

Route::get('/guest-arrival', function () {
    return view('pages.guest-arrival');
});

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
