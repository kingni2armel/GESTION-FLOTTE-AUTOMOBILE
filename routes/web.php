<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\UserController;

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
Route::get('/redirection',[UserController::class,'Redirection'])->name('Redirection');

Route::post('/login',[UserController::class,'Authenticate'])->name('Authenticate');
Route::get('/logout',[UserController::class,'Logout'])->name('Logout');

Route::get('/createuser',[UserController::class,'GetPage'])->name('GetPage')
->middleware('auth');
Route::post('/adduser',[UserController::class,'AddUser'])->name('AddUser');

