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
    return view('welcome');
});

//dashboard Routes
Route::get('home', 'HomesController@index')->name('dashboard');

//Auth Routes
Route::get('signup', 'UsersController@signup')->name('signup');
Route::post('/signup-store/{role}', 'UsersController@store')->name('signup.store');

Route::resource('profil', 'ProfilsController');

//Management Routes
Route::get('control-panel', 'UsersController@userList')->name('user.list');
Route::delete('control-panel/{id}', 'UsersController@delete')->name('user.delete');
Route::resource('jobs', 'JobsController');
Route::post('regis-jobs/{id}/', 'HomesController@regis')->name('jobs.regis');
Route::get('jobs-download/{user}/{set}', 'HomesController@fileDownload')->name('jobs.download');
Route::put('jobs-status/{user}/{job}', 'HomesController@changeStatus')->name('jobs.status');

//Session Routes
Route::get('login', 'SessionsController@login')->name('login');
Route::post('login-store', 'SessionsController@loginStore')->name('login.store');
Route::get('logout', 'SessionsController@logout')->name('logout');