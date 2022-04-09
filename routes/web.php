<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
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

Route::get('/home', [HomeController::class, 'index'])->name("home");

//Register
Route::get('/register', function () {
    return view('register');
});
Route::post('/register',[RegisterController::class, 'create']);

//Login
Route::get('/login', function () {
    return view('login');
});
Route::post('/login',[LoginController::class, 'login']);


//Favorites
Route::get('/favoritos', [NoticeController::class, 'index'])->name("favorites");
Route::get('/allFavoritesNotice/{user_id}', [NoticeController::class, 'getFavorites']);
Route::post('/addOrRemoveFavorite',[NoticeController::class, 'addOrRemoveFavorite']);

