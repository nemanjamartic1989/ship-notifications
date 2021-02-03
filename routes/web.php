<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
