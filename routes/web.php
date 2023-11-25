<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;

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

Route::middleware('guest')->group(function () {
   Route::get('/login', [AuthController::class, 'login'])->name('login');
   Route::post('/login', [AuthController::class, 'store']);

   Route::get('/register', [RegisterController::class, 'index'])->name('register');
   Route::post('/register', [RegisterController::class, 'store']);
});

Route::middleware('auth')->group(function () {
   Route::get('/', [HomeController::class, 'index']);
   Route::get('/profile', [UserController::class, 'profile']);
   Route::get('/edit-profile', [UserController::class, 'editProfile']);
   Route::post('/edit-profile', [UserController::class, 'saveProfile']);

   Route::resource('post', PostController::class);

   Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
