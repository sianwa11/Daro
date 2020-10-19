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

// Profile controller
Route::resource('profile', 'ProfileController');
/*Route::get('/profile/create', [\App\Http\Controllers\ProfileController::class, 'create']);
Route::post('/profile', [\App\Http\Controllers\ProfileController::class, 'store']);
Route::get('/profile/{profile}', [\App\Http\Controllers\ProfileController::class, 'show']);
Route::patch('/profile/{profile}', [\App\Http\Controllers\ProfileController::class, 'update']);*/

// VirtualClass controller
Route::resource('virtual_class', 'VirtualClassController');
Route::get('/archived','VirtualClassController@archived');
Route::post('virtual_class/{virtual_class}/restore', 'VirtualClassController@restore');
Route::post('virtual_class/{virtual_class}/delete', 'VirtualClassController@deletePermanently');
