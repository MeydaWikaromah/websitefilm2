<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/home', function () {
//     return view('home');
// });

Route::get('/film', function () {
    return view('film');
});

Route::resource('film', FilmController::class) ->name('index','film');


Route::get('/home',[FilmController::class, 'show']);
Route::get('/',[FilmController::class, 'show']);


Route::get('/home',[FilmController::class, 'cari']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/register', [RegisterController::class, 'show'])->name('register.show');

Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'show'])->name('login');

Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');


