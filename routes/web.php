<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShipController;
use App\Http\Controllers\CrewMemberController;


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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['prefix' => 'users'], function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/show/{id}', [UserController::class, 'show']);
    Route::get('/delete/{id}', [UserController::class, 'destroy'])
        ->name('delete-user');
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
    Route::post('/update/{id}', [ShipController::class, 'update'])
        ->name('update-ship');
    Route::get('/delete/{id}', [ShipController::class, 'destroy'])
        ->name('delete-ship');
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
    Route::post('/update/{id}', [CrewMemberController::class, 'update'])
        ->name('update-crew-member');
    Route::get('/delete/{id}', [CrewMemberController::class, 'destroy'])
        ->name('delete-crew-member');
    Route::get('/search', [CrewMemberController::class, 'search'])
        ->name('search-crew-members');
});
