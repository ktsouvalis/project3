<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('messages', MessageController::class);

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function () {
    $credentials = request()->only('email', 'password');
    if (auth()->attempt($credentials)) {
        return redirect('/messages');
    }
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
});
