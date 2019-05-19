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

/*========================================================================================
|  									APPLIACTION SECTION				     	             |
|=======================================================================================*/
/*----------------------------------------------------------------------------------------
| Page Home      							               								 |
|---------------------------------------------------------------------------------------*/
Route::get('/home', 'HomeController@index')
	->name('home')
	->middleware('verified');

/*----------------------------------------------------------------------------------------
| Page Profile     							               								 |
|---------------------------------------------------------------------------------------*/
Route::get('/profile', 'ProfileController@index')
	->name('profile')
	->middleware('verified');

/*----------------------------------------------------------------------------------------
| Page Challenges  							               								 |
|---------------------------------------------------------------------------------------*/
Route::get('/challenges', 'ChallengeController@index')
	->name('challenges')
	->middleware('verified');

Route::post('/challenges/accept', 'ChallengeController@accept')
	->name('challenges.accept')
	->middleware('verified');

Route::post('/challenges/finish', 'ChallengeController@finish')
	->name('challenges.finish')
	->middleware('verified');

/*========================================================================================
|  										ADMIN SECTION 						             |
|=======================================================================================*/
/*----------------------------------------------------------------------------------------
| Page Dashboard 							               								 |
|---------------------------------------------------------------------------------------*/
Route::get('/admin/dashboard', 'Admin\DashboardController@index')
	->name('admin.dashboard')
	->middleware('verified', 'can:/admin/dashboard');

/*----------------------------------------------------------------------------------------
| Page Questions 							               								 |
|---------------------------------------------------------------------------------------*/
Route::get('/admin/questions', 'Admin\QuestionController@index')
	->name('admin.questions')
	->middleware('verified', 'can:/admin/questions');

Route::post('/admin/questions/new', 'Admin\QuestionController@create')
	->name('admin.questions.new')
	->middleware('verified', 'can:/admin/questions');

Route::post('/admin/questions/update', 'Admin\QuestionController@update')
	->name('admin.questions.update')
	->middleware('verified', 'can:/admin/questions');

Route::post('/admin/questions/destroy', 'Admin\QuestionController@destroy')
	->name('admin.questions.destroy')
	->middleware('verified', 'can:/admin/questions');

// To manipulate route with GET method to fix errors
Route::get('/admin/questions/new', function () {
	return redirect()->route('admin.questions');
})->middleware('verified');

Route::get('/admin/questions/update', function () {
	return redirect()->route('admin.questions');
})->middleware('verified');

Route::get('/admin/questions/destroy', function () {
	return redirect()->route('admin.questions');
})->middleware('verified');

// Using AJAX to search the questoin more fast
Route::get(
	'/admin/questions/show/{content?}',
	'Admin\QuestionController@search'
)->middleware('verified');

/*----------------------------------------------------------------------------------------
| Page Challenges 																		 |
|---------------------------------------------------------------------------------------*/
Route::get('/admin/challenges', 'Admin\ChallengeController@index')
	->name('admin.challenges')
	->middleware('verified', 'can:/admin/challenges');

Route::post('/admin/challenges/new', 'Admin\ChallengeController@create')
	->name('admin.challenges.new')
	->middleware('verified', 'can:/admin/challenges');

Route::post('/admin/challenges/update', 'Admin\ChallengeController@update')
	->name('admin.challenges.update')
	->middleware('verified', 'can:/admin/challenges');

// To manipulate route with GET method to fix errors
Route::get('/admin/challenges/new', function () {
	return redirect()->route('admin.challenges');
})->middleware('verified');

Route::get('/admin/challenges/update', function () {
	return redirect()->route('admin.challenges');
})->middleware('verified');

// AJAX to get all alternatives about question id on parameter
Route::get(
	'/admin/challenges/alternatives/{idQuestion}',
	'Admin\ChallengeController@alternatives'
)->middleware('verified');

Route::get(
	'/admin/challenges/level_challenge/{idLevelChallenge}',
	'Admin\ChallengeController@levelChallenge'
)->middleware('verified');
