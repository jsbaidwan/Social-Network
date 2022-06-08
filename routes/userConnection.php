<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('/send-request', [App\Http\Controllers\UserController::class, 'create_request'])->name('create_request');
Route::post('/get-suggestions', [App\Http\Controllers\HomeController::class, 'get_suggestions'])->name('get_suggestions');

Route::post('/get-sent-requests', [App\Http\Controllers\HomeController::class, 'sent_requests'])->name('sent_requests');

Route::post('/get-recieved-requests', [App\Http\Controllers\HomeController::class, 'recieved_requests'])->name('recieved_requests');

Route::post('/withdraw-request', [App\Http\Controllers\HomeController::class, 'withdraw_request'])->name('withdraw_request');

Route::post('/accept-request', [App\Http\Controllers\HomeController::class, 'accept_request'])->name('accept_request');

