<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserItemController;

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('accounts/index', [AccountController::class, 'index']);
//Route::get('/{error_id?}', [AccountController::class, 'login']);
//Route::post('doLogin', [AccountController::class, 'doLogin']);
//Route::get('userIndex', [AccountController::class, 'userIndex']);
//Route::get('scoreIndex', [AccountController::class, 'scoreIndex']);
Route::get('index', [AccountController::class, 'index']);
Route::get('user', [UserController::class, 'user']);
Route::get('item', [ItemController::class, 'item']);
Route::get('userItem', [UserItemController::class, 'userItem']);

Route::get('{error_id?}', [AuthController::class, 'index']);
Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout']);
