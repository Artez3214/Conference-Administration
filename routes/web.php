<?php

use App\Http\Controllers\ConferencesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticatorController;
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
Route::get('/login', [AuthenticatorController::class, 'login'])->name('login');
Route::post('/login', [AuthenticatorController::class, 'loginPost'])->name('login.post');
Route::get('/logout',[AuthenticatorController::class, 'logout'])->name('logout');
Route::get('/',[ConferencesController::class, 'index'])->name('conferences');
Route::get('/show/{value}',[ConferencesController::class, 'show'])->name('conferences.show');
Route::get('/registration', [AuthenticatorController::class, 'registration'])->name('registration');
Route::post('/registration', [AuthenticatorController::class, 'registrationPost'])->name('registration.post');
Route::group(['middleware' =>'auth'], function(){
    Route::get('/create',[ConferencesController::class, 'createConferences'])->name('createConferences');
    Route::post('/create',[ConferencesController::class, 'postConferences'])->name('conferences.post');
    Route::post('/destroy',[ConferencesController::class, 'destroy'])->name('conferences.destroy');
    Route::get('/edit/{value}',[ConferencesController::class, 'edit'])->name('conferences.edit');
    Route::put('/edit/{id}',[ConferencesController::class, 'postEdit'])->name('edit.post');
});

