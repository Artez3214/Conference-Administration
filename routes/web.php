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
Route::get('/',[ConfManager::class, 'conferences'])->name('conferences');
Route::group(['middleware' =>'auth'], function(){
    Route::get('/create',[ConfManager::class, 'createConferences'])->name('createConferences');
    Route::post('/create',[ConfManager::class, 'postConferences'])->name('conferences.post');
});
