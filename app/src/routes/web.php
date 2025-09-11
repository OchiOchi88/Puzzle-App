<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CreateItemController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserElementController;
use App\Http\Controllers\UserPaletteController;
use App\Http\Controllers\UserStageController;
use App\Http\Controllers\UserTileController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserItemController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\TileController;
use App\Http\Controllers\ElementController;
use App\Http\Controllers\PaletteController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\UserAchievementController;

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('accounts/index', [AccountController::class, 'index']);
//Route::get('/{error_id?}', [AccountController::class, 'login']);
//Route::post('doLogin', [AccountController::class, 'doLogin']);
//Route::get('userIndex', [AccountController::class, 'userIndex']);
//Route::get('scoreIndex', [AccountController::class, 'scoreIndex']);
Route::get('index', [AccountController::class, 'index']);

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


Route::prefix('items')->name('items.')->controller(ItemController::class)
    ->middleware(AuthMiddleware::class)->group(function () {
        //Route::get('index', 'index')->name('index'); // item.index
        //Route::get('create', 'create')->name('create'); // item.create
        Route::get('store', 'store')->name('store'); // item.store
    });
Route::post('logined', [AuthController::class, 'logined']);

Route::get('test', [TestController::class, 'tests']);

Route::get('login', [AuthController::class, 'toLogin']);
Route::post('login', [AuthController::class, 'login']);
Route::post('home', [AuthController::class, 'home']);
Route::get('users', [UserController::class, 'index']);
Route::get('users/detail', [UserController::class, 'userDetail']);
Route::get('stages', [StageController::class, 'index']);
Route::get('tiles', [TileController::class, 'index']);
Route::get('elements', [ElementController::class, 'index']);
Route::get('palettes', [PaletteController::class, 'index']);
Route::get('achievements', [AchievementController::class, 'index']);
Route::get('user-achievements', [UserAchievementController::class, 'index']);
Route::post('achievements/store', [AchievementController::class, 'store']);
Route::post('achievements/update', [AchievementController::class, 'update']);
Route::post('achievements/delete', [AchievementController::class, 'delete']);
Route::post('elements/store', [ElementController::class, 'store']);
Route::post('elements/update', [ElementController::class, 'update']);
Route::post('elements/delete', [ElementController::class, 'delete']);
Route::post('palettes/store', [PaletteController::class, 'store']);
Route::post('palettes/delete', [PaletteController::class, 'delete']);
Route::post('stages/store', [StageController::class, 'store']);
Route::post('stages/update', [StageController::class, 'update']);
Route::post('stages/delete', [StageController::class, 'delete']);
Route::post('tiles/store', [TileController::class, 'store']);
Route::post('tiles/update', [TileController::class, 'update']);
Route::post('tiles/delete', [TileController::class, 'delete']);
Route::post('user-achievements/store', [UserAchievementController::class, 'store']);
Route::post('user-achievements/delete', [UserAchievementController::class, 'delete']);
Route::post('users/store', [UserController::class, 'store']);
Route::post('users/update', [UserController::class, 'update']);
Route::post('users/delete', [UserController::class, 'delete']);

Route::get('user-stages', [UserStageController::class, 'index']);
Route::get('user-tiles', [UserTileController::class, 'index']);
Route::get('user-elements', [UserElementController::class, 'index']);
Route::get('user-palettes', [UserPaletteController::class, 'index']);
Route::post('publish', [UserStageController::class, 'publish']);

// ユーザー登録
//Route::post('users/store', [UserController::class, 'store'])->name('user.store');

// ユーザー情報更新
//Route::post('users/update', [UserController::class, 'update'])
//    ->middleware('auth:sanctum')->name('users.update');
