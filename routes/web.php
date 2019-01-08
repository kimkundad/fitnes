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
  Route::resource('admin/member', 'MemberController');
  Route::get('admin/preview/{id}', 'MemberController@preview')->name('preview');
  Route::get('admin/table_course/create', 'Course_tableController@create');
  Route::post('admin/table_course/add_class', 'Course_tableController@post_class');
  Route::get('get_event', 'Course_tableController@get_event');
  Route::get('get_event_c/{id}', 'Course_tableController@get_event_c');
  Route::post('post_class_in', 'Course_tableController@post_class_in');
  Route::post('admin/del_class_t', 'Course_tableController@del_class_t');

  Route::get('edit_c_t/{id}', 'CourseController@edit_c_t');
  Route::post('edit_c_t_post', 'Course_tableController@edit_c_t_post');


});
