<?php

use App\Livewire\OtpInput;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/otp-verification', OtpInput::class)->name('otp.verify');
});

Route::get('/', function () {
    return view('welcome');
});
