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

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('website', 'WebsiteController');
    Route::resource('ftp', 'FtpController');
    Route::resource('databases', 'DatabasesController');
    Route::resource('email', 'EmailController');
    Route::resource('profile', 'ProfileController');


    Route::resource('roles','RoleController');
    Route::resource('users','UserController');

});
