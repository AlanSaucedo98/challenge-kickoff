<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticeController;
Use App\Http\Middleware\Authenticate;
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


//Favorites
Route::group(['middleware' => 'auth'], function () {
    Route::get('/favoritos', [NoticeController::class, 'index'])->middleware('auth');
    Route::post('/allFavoritesNotice', [NoticeController::class, 'getFavorites'])->middleware('auth');
    Route::post('/addOrRemoveFavorite',[NoticeController::class, 'addOrRemoveFavorite'])->middleware('auth');
    Route::get('/home', [HomeController::class, 'index'])->name('home');

});

Auth::routes();





