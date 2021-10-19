<?php

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

// Home Route
Route::get('', 'HomeController@index')->middleware('auth')->name('home');


// Courses Routes
Route::resource('courses', CoursesController::class)->middleware('auth');
Route::get('/course-view/{$id}', 'HomeController@courseView')->name('course.view');


// Students Routes
Route::resource('students', StudentsController::class)->middleware('auth');
// Route::get('/students/{$id}', 'StudentsController@view')->name('students.view');


Auth::routes();

