<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicationController;

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
Route::resource('profile',ProfileController::class);
Route::resource('publication',PublicationController::class);
Route::get('/',[HomeController::class,"index"])->name("homepage");
Route::get('/verify_email/{hash}',[ProfileController::class,"verifyEmail"]);
Route::middleware('guest')->group(function(){
    Route::get('/login',[LoginController::class,'show'])->name('login.show');
    Route::post('/login',[LoginController::class,'login'])->name('login');
});
Route::get('/logout',[LoginController::class,'logout'])->name('login.logout');

