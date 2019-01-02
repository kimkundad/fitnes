<?php

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
    return view('auth.login');
});

Route::auth();

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'admin'], function() {

  Route::get('admin/dashboard', 'DashboardController@index')->name('dashboard');
  Route::resource('admin/category', 'CategoryController');
  Route::resource('admin/course', 'CourseController');
  Route::get('admin/table_course', 'Course_tableController@index');
  Route::resource('admin/course', 'CourseController');
  Route::resource('admin/trainer', 'TrainerController');
});
