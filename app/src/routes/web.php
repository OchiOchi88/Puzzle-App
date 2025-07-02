<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CreateItemController;
use App\Http\Controllers\StageController;
use App\Http\Middleware\AuthMiddleware;
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
Route::post('store', [ItemController::class, 'store']);
Route::post('create', [CreateItemController::class, 'create']);
Route::get('create', [CreateItemController::class, 'create']);
Route::post('create{error_id}', [CreateItemController::class, 'create']);
Route::get('destroy', [ItemController::class, 'destroy']);
Route::get('delete', [ItemController::class, 'delete']);

//Route::get('{error_id?}', [AuthController::class, 'index']);  //  ログインしていない状態ならログイン画面へ飛ばす
Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('items/create', [CreateItemController::class, 'create'])->name('items.create');
Route::post('items/create', [CreateItemController::class, 'create'])->name('items.create');
Route::post('items/store', [ItemController::class, 'store'])->name('items.store');

Route::get('detail', [UserController::class, 'userDetail']);

Route::post('logined', [AuthController::class, 'logined']);

Route::prefix('items')->name('items.')->controller(ItemController::class)
    ->middleware(AuthMiddleware::class)->group(function () {
        //Route::get('index', 'index')->name('index'); // item.index
        //Route::get('create', 'create')->name('create'); // item.create
        Route::get('store', 'store')->name('store'); // item.store
    });

Route::get('stage', [StageController::class, 'index']);
