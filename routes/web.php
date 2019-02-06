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

Route::get('change/{locale}', function ($locale) {
	App::setLocale($locale);
  session(['locale' => $locale]);
  return Redirect::back();
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'admin'], function() {

  Route::get('admin/dashboard', 'DashboardController@index')->name('dashboard');
  Route::get('admin/owner', 'DashboardController@owner')->name('owner');
  Route::get('followersdata', 'DashboardController@followersdata')->name('followersdata');
  Route::post('search_date_owner', 'DashboardController@search_date_owner')->name('search_date_owner');


  Route::resource('admin/category', 'CategoryController');
  Route::resource('admin/course', 'CourseController');
  Route::get('admin/table_course', 'Course_tableController@index');
  Route::resource('admin/course', 'CourseController');
  Route::resource('admin/trainer', 'TrainerController');
  Route::resource('admin/member', 'MemberController');
  Route::get('admin/preview/{id}', 'MemberController@preview')->name('preview');
  Route::get('admin/member/{id}/history', 'MemberController@report')->name('report');
  Route::get('admin/table_course/create', 'Course_tableController@create');
  Route::post('admin/table_course/add_class', 'Course_tableController@post_class');
  Route::get('get_event', 'Course_tableController@get_event');
  Route::get('get_event_c/{id}', 'Course_tableController@get_event_c');
  Route::post('post_class_in', 'Course_tableController@post_class_in');
  Route::post('admin/del_class_t', 'Course_tableController@del_class_t');

  Route::get('edit_c_t/{id}', 'CourseController@edit_c_t');
  Route::post('edit_c_t_post', 'Course_tableController@edit_c_t_post');
  Route::post('search_mem', 'MemberController@search_mem');
  Route::post('search_mem_dash', 'DashboardController@search_mem');
  Route::post('api/api_tech_status', 'DashboardController@api_tech_status');
  Route::post('admin/add_time_post', 'MemberController@add_time_post');

  Route::get('admin/get_member_his', 'MemberController@get_member_his');
  Route::get('admin/add_time/{id}', 'MemberController@add_time');
  Route::post('search_history', 'MemberController@search_history')->name('search_history');
  Route::get('admin/his_trainer', 'TrainerController@trainer_his');
  Route::get('admin/trainer_his/{id}', 'TrainerController@trainer_his_id');

  Route::get('admin/check_in_member', 'MemberController@check_in_member')->name('check_in_member');
  Route::get('admin/pay_member/{id}', 'MemberController@pay_member')->name('pay_member');
  Route::post('admin/search_mem_checkin', 'MemberController@search_mem_checkin')->name('search_mem_checkin');



});
