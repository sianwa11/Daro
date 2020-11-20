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

//Student Controller
Route::get('/home', 'HomeController@index')->name('home')->middleware('role:student');
Route::get('preview_class/{id}', [\App\Http\Controllers\HomeController::class, 'previewClass']);

Route::get('/a_home', '\App\Http\Controllers\Admin\HomeController@index')->middleware('role:admin');
Route::get('/t_home', '\App\Http\Controllers\Teacher\HomeController@index')->middleware('role:teacher');

// Profile controller
Route::resource('profile', 'ProfileController')->middleware('auth');
/*Route::get('/profile/create', [\App\Http\Controllers\ProfileController::class, 'create']);
Route::post('/profile', [\App\Http\Controllers\ProfileController::class, 'store']);
Route::get('/profile/{profile}', [\App\Http\Controllers\ProfileController::class, 'show']);
Route::patch('/profile/{profile}', [\App\Http\Controllers\ProfileController::class, 'update']);*/

// VirtualClass controller
Route::resource('virtual_class', 'VirtualClassController')->middleware('role:teacher');
Route::get('/archived','VirtualClassController@archived');
Route::post('virtual_class/{virtual_class}/restore', 'VirtualClassController@restore');
Route::post('virtual_class/{virtual_class}/delete', 'VirtualClassController@deletePermanently');

// VirtualClass Posts controller
Route::post('/virtual_class/{virtual_class}/virtual_class_posts', [\App\Http\Controllers\VirtualClassPostController::class, 'store']);
Route::delete('/virtual_class_post/{virtual_class}/', [\App\Http\Controllers\VirtualClassPostController::class, 'destroy']);

// VirtualClass Assignments controller
Route::get('/assignment/create/{virtual_class}', [\App\Http\Controllers\VirtualClassAssignmentController::class, 'create'])->middleware('role:teacher');
Route::post('/virtual_class/{virtual_class}/assignment', [\App\Http\Controllers\VirtualClassAssignmentController::class, 'store']);
Route::get('/assignment/{id}', [\App\Http\Controllers\VirtualClassAssignmentController::class, 'show']);
Route::patch('/assignment/{id}', [\App\Http\Controllers\VirtualClassAssignmentController::class, 'update']);
Route::delete('/assignment/{id}', [\App\Http\Controllers\VirtualClassAssignmentController::class, 'destroy']);

// JoinClass controller
Route::post('/join_class/{id}', [\App\Http\Controllers\JoinClassController::class, 'joinClass']);

// EnrolledClass controller
Route::get('/myclasses', [\App\Http\Controllers\EnrolledClassController::class,'index']);
Route::get('/class/{id}', [\App\Http\Controllers\EnrolledClassController::class, 'show']);
Route::get('/class/{id}/assignments', [\App\Http\Controllers\EnrolledClassController::class, 'showAssignments']);
Route::get('/class/{id}/classmates', [\App\Http\Controllers\EnrolledClassController::class, 'showClassmates']);
Route::post('/class/{id}/assignment', [\App\Http\Controllers\EnrolledClassController::class, 'uploadAssignments']);
