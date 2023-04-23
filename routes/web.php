<?php

use App\Http\Controllers\ConfManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
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
Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('/logout',[AuthManager::class, 'logout'])->name('logout');
Route::get('/',[ConfManager::class, 'index'])->name('conferences');

Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');
Route::group(['middleware' =>'auth'], function(){
    Route::get('/create',[ConfManager::class, 'createConferences'])->name('createConferences');
    Route::post('/create',[ConfManager::class, 'postConferences'])->name('conferences.post');
    Route::get('/show/{value}',[ConfManager::class, 'show'])->name('conferences.show');
    Route::post('/destroy',[ConfManager::class, 'destroy'])->name('conferences.destroy');
    Route::get('/edit/{value}',[ConfManager::class, 'edit'])->name('conferences.edit');
    Route::put('/edit/{id}',[ConfManager::class, 'postEdit'])->name('edit.post');
});

