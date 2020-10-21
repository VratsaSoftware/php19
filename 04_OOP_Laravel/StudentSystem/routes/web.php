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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomePageController@index')->name('homepage');
Route::get('/users', 'UsersController@index')->name('users.list');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile');

//courses
Route::get('/courses', 'CoursesController@index')->name('courses.list');
Route::get('/courses/{course}', 'CoursesController@courses_levels_list')->name('courses.levels_list');
Route::get('/courses/{course}/students', 'CoursesController@courses_students_list')->name('courses.students_list');

Route::get('/levels', 'LevelsController@levels_list')->name('levels');
Route::get('/levels/{level}', 'LevelsController@show')->name('levels.show');


Route::get('/lectures', 'LecturesController@lectures_list')->name('lectures');
Route::get('/lectures/{level}', 'LecturesController@index')->name('level.lectures_list');
Route::get('/lectures/{lecture}', 'LecturesController@show')->name('lectures.show');

Route::resource('halls', 'HallsController');