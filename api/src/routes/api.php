<?php

use App\Http\Controllers\userController;
use App\Http\Controllers\stageController;
use App\Http\Controllers\tileController;
use App\Http\Controllers\elementController;
use App\Http\Controllers\paletteController;
use App\Http\Controllers\userDetailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('userDetails',
    [userDetailController::class, 'userDetails'])
    ->name('userDetails.index');

Route::get('userDetails/index',
    [userDetailController::class, 'detailIndex'])
    ->name('userDetails.index');

Route::get('userDetails/{user_id}',
    [userDetailController::class, 'detailShow'])
    ->name('userDetails.show');

Route::post('userDetails/store',
    [UserDetailController::class, 'detailStore'])
    ->name('userDetails.store');

Route::post('userDetails/update',
    [UserDetailController::class, 'detailUpdate'])
    ->name('userDetails.update');

Route::post('userItems/store',
    [UserDetailController::class, 'itemStore'])
    ->name('userItems.store');

Route::post('userItems/delete',
    [UserDetailController::class, 'itemDelete'])
    ->name('userItems.delete');

Route::post('userItems/updateAdd',
    [UserDetailController::class, 'itemUpdateAdd'])
    ->name('userItems.itemUpdateAdd');

Route::post('userItems/updateRemove',
    [UserDetailController::class, 'itemUpdateRemove'])
    ->name('userItems.itemUpdateRemove');

// ユーザー登録
Route::post('users/store', [userController::class, 'store'])->name('user.store');

// ユーザー情報更新
Route::post('users/update', [userController::class, 'update'])
    ->middleware('auth:sanctum')->name('users.update');

// ユーザー情報取得
Route::post('users/index', [userController::class, 'index'])
    ->middleware('auth:sanctum')->name('users.index');

// ステージ情報取得
Route::get('stages/get/{stage_id}', [stageController::class, 'get'])
    ->name('stages.get');
// タイル情報取得
Route::get('tiles/get/{stage_id}', [tileController::class, 'get'])
    ->name('tiles.get');
// 元素情報取得
Route::get('elements/get/{element_id}', [elementController::class, 'get'])
    ->name('elements.get');
// パレット情報取得
Route::get('palettes/get/{palette_id}', [paletteController::class, 'get'])
    ->name('palettes.get');
