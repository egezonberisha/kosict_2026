<?php

use App\Http\Controllers\DemoMessageController;
use App\Http\Controllers\PollResponseController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DemoMessageController::class, 'index'])->name('home');

Route::post('/vote', [PollResponseController::class, 'store'])
    ->middleware('throttle:10,1')
    ->name('vote');

Route::get('/results', [PollResponseController::class, 'results'])->name('results');

Route::post('/messages', [DemoMessageController::class, 'store'])
    ->middleware('throttle:10,1')
    ->name('demo-messages.store');
