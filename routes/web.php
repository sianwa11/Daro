<?php

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

// login is the primary view temporarily
Route::view('/', 'auth/login')->middleware('guest'); // access if guest

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('role:student');
Route::view('/success', 'success')->name('success'); // note the name() method.

Route::get('/a_home', '\App\Http\Controllers\Admin\HomeController@index')->middleware('role:admin');
Route::get('/t_home', '\App\Http\Controllers\Teacher\HomeController@index')->middleware('role:teacher');
