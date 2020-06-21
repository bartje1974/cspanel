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



Route::get('dns/{domain}', 'DnsController@index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware(['auth']);
Route::resource('website', 'WebsiteController')->middleware(['auth']);
Route::resource('ftp', 'FtpController')->middleware(['auth']);
Route::resource('databases', 'DatabasesController')->middleware(['auth']);
Route::resource('email', 'EmailController')->middleware(['auth']);
Route::resource('profile', 'ProfileController')->middleware(['auth']);