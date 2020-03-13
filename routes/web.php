<?php

use App\Challenge;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::resource('/users', 'UserController');
Route::resource('/home', 'ChallengeController')->middleware('is_admin');
Route::view('/guest', 'guest')->name('guest')->middleware('is_guest');
