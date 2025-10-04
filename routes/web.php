<?php

use Illuminate\Support\Facades\Route;
use Idoneo\HumanoChat\Http\Controllers\ChatController;

Route::middleware(['web', 'auth'])->group(function () {
	Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
});


