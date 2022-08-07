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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class,'index'])->name('home');
Auth::routes();

//Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

Route::get('admin', function() {
		return redirect('admin/dashboard');
	});

	Route::get('admin/dashboard', 'App\Http\Controllers\Admin\HomeController@index')->name('home');

	Route::resource('admin/admins', 'App\Http\Controllers\Admin\AdminController', ['except' => ['show']]);

	Route::resource('admin/users', 'App\Http\Controllers\Admin\UserController', ['except' => ['show']]);

	Route::resource('admin/tracks', 'App\Http\Controllers\Admin\TrackController');

	Route::resource('admin/tracks.courses', 'App\Http\Controllers\Admin\TrackCourseController');

	Route::resource('admin/courses', 'App\Http\Controllers\Admin\CourseController');

	Route::resource('admin/courses.videos', 'App\Http\Controllers\Admin\CourseVideoController');

	Route::resource('admin/courses.quizzes', 'App\Http\Controllers\Admin\CourseQuizController');

	Route::resource('admin/videos', 'App\Http\Controllers\Admin\VideoController');

	Route::resource('admin/quizzes', 'App\Http\Controllers\Admin\QuizController');

	Route::resource('admin/quizzes.questions', 'App\Http\Controllers\Admin\QuizQuestionController');

	Route::resource('admin/questions', 'App\Http\Controllers\Admin\QuestionController', ['except' => ['show']]);

	Route::get('admin/profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\Admin\ProfileController@edit']);

	Route::put('admin/profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\Admin\ProfileController@update']);

	Route::put('admin/profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\Admin\ProfileController@password']);


	// Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	// Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	// Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	// Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade');
	//  Route::get('map', function () {return view('pages.maps');})->name('map');
	//  Route::get('icons', function () {return view('pages.icons');})->name('icons');
	//  Route::get('table-list', function () {return view('pages.tables');})->name('table');
	// Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

