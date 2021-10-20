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
Route::get('/courses/delete/{id}', 'CoursesController@destroy')->name('courses.destroy');


// Students Routes
// Route::resource('students', StudentsController::class)->middleware('auth');
Route::get('/students/show/{id}', 'StudentsController@show')->name('students.show');
Route::get('/students', 'StudentsController@index')->name('students.index');
Route::get('/students/create/{id}', 'StudentsController@create')->name('students.create');
Route::post('/students/store', 'StudentsController@store')->name('students.store');
Route::get('/students/delete/{id}', 'StudentsController@destroy')->name('students.destroy');
Route::get('/students/edit/{id}', 'StudentsController@edit')->name('students.edit');
Route::post('/students/update/{id}', 'StudentsController@update')->name('students.update');


// Route::get('/students/{$id}', 'StudentsController@view')->name('students.view');


Auth::routes();

Route::get('/auth', function(){
    return view('home');
});
