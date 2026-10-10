<?php

use App\Http\Controllers\DemoMessageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DemoMessageController::class, 'index'])->name('home');

Route::post('/messages', [DemoMessageController::class, 'store'])
    ->middleware('throttle:10,1')
    ->name('demo-messages.store');
