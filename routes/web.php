<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShipController;
use App\Http\Controllers\CrewMemberController;
use App\Http\Controllers\RankController;
use App\Http\Controllers\NotificationController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['prefix' => 'users'], function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/show/{id}', [UserController::class, 'show']);
    Route::put('/delete/{id}', [UserController::class, 'destroy'])
        ->name('delete-user'); // In fact, this is update field in database where this item will not displayed.
    Route::get('/search', [UserController::class, 'search'])
        ->name('search-users');
});

Route::group(['prefix' => 'ships'], function () {
    Route::get('/', [ShipController::class, 'index']);
    Route::get('/create', [ShipController::class, 'create']);
    Route::get('/edit/{id}', [ShipController::class, 'edit']);
    Route::get('/show/{id}', [ShipController::class, 'show']);
    Route::post('/store', [ShipController::class, 'store'])
        ->name('ships-store');
    Route::put('/update/{id}', [ShipController::class, 'update'])
        ->name('update-ship');
    Route::put('/delete/{id}', [ShipController::class, 'destroy'])
        ->name('delete-ship'); // In fact, this is update field in database where this item will not displayed.
    Route::get('/search', [ShipController::class, 'search'])
        ->name('search-ships');
});

Route::group(['prefix' => 'crew-members'], function () {
    Route::get('/', [CrewMemberController::class, 'index']);
    Route::get('/create', [CrewMemberController::class, 'create']);
    Route::get('/edit/{id}', [CrewMemberController::class, 'edit']);
    Route::get('/show/{id}', [CrewMemberController::class, 'show']);
    Route::post('/store', [CrewMemberController::class, 'store'])
        ->name('store-crew-member');
    Route::put('/update/{id}', [CrewMemberController::class, 'update'])
        ->name('update-crew-member');
    Route::put('/delete/{id}', [CrewMemberController::class, 'destroy'])
        ->name('delete-crew-member'); // In fact, this is update field in database where this item will not displayed.
    Route::get('/search', [CrewMemberController::class, 'search'])
        ->name('search-crew-members');
});

Route::group(['prefix' => 'ranks'], function () {
    Route::get('/', [RankController::class, 'index']);
    Route::get('/create', [RankController::class, 'create']);
    Route::get('/edit/{id}', [RankController::class, 'edit']);
    Route::get('/show/{id}', [RankController::class, 'show']);
    Route::post('/store', [RankController::class, 'store'])
        ->name('store-rank');
    Route::put('/update/{id}', [RankController::class, 'update'])
        ->name('update-rank');
    Route::put('/delete/{id}', [RankController::class, 'destroy'])
        ->name('delete-rank'); // In fact, this is update field in database where this item will not displayed.
    Route::get('/search', [RankController::class, 'search'])
        ->name('search-ranks');
});

Route::group(['prefix' => 'notifications'], function () {
    Route::get('/', [NotificationController::class, 'index']);
    Route::get('/create', [NotificationController::class, 'create']);
    Route::post('/store', [RankController::class, 'store'])
        ->name('store-notification');
});
