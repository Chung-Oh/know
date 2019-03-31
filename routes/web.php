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
    return view('index.welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('app.home')->middleware('verified');

Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard')->middleware('verified');

Route::get('/questions', 'Admin\QuestionController@index')->name('admin.question')->middleware('verified');

Route::post('/questions/new', 'Admin\QuestionController@create')->name('questions.new')->middleware('verified');
