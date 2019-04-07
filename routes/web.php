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

Auth::routes(['verify' => true]); // Verify Email

/*
|--------------------------------------------------------------------------
| APPLIACTION SECTION
|--------------------------------------------------------------------------
*/
Route::get('/home', 'HomeController@index')
	->name('home')
	->middleware('verified');

/*
|--------------------------------------------------------------------------
|  ADMIN SECTION
|--------------------------------------------------------------------------
*/
// Page Dashboard
Route::get('/admin/dashboard', 'Admin\DashboardController@index')
	->name('dashboard')
	->middleware('verified');

// Page Questions
Route::get('/admin/questions', 'Admin\QuestionController@index')
	->name('questions')
	->middleware('verified');

Route::post('/admin/questions/new', 'Admin\QuestionController@create')
	->name('questions.new')
	->middleware('verified');

Route::get('/admin/questions/new', function () {
	return redirect()->route('questions');
})->middleware('verified');

Route::post('/admin/questions/update', 'Admin\QuestionController@update')
	->name('questions.update')
	->middleware('verified');

Route::get('/admin/questions/update', function () {
	return redirect()->route('questions');
})->middleware('verified');

Route::post('/admin/questions/destroy', 'Admin\QuestionController@destroy')
	->name('questions.destroy')
	->middleware('verified');

Route::get('/admin/questions/destroy', function () {
	return redirect()->route('questions');
})->middleware('verified');
