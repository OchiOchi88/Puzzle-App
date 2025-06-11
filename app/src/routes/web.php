<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('accounts/index', [AccountController::class, 'index']);
Route::post('doLogin', [AccountController::class, 'doLogin']);
Route::get('userIndex', [AccountController::class, 'userIndex']);
Route::get('scoreIndex', [AccountController::class, 'scoreIndex']);
//Route::get('infoIndex{page?}', [AccountController::class, 'infoIndex']);
Route::get('/{error_id?}', [AccountController::class, 'login']);
