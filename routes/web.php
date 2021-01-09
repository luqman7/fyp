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

use FYP\Http\Controllers\ApptController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('admin');

Route::resource('newborns', 'NewbornsController');
Route::resource('admins', 'AdminController');
Route::resource('users', 'UsersController');
Route::resource('appointments', 'ApptController');

Route::get('/users', 'UsersController@edit')->name('users.edit-profile');
Route::put('/users', 'UsersController@update')->name('users.update-profile');

Route::get('/telegram', 'TelegramBotController@sendMessage')->name('telegram');
Route::post('/send-message', 'TelegramBotController@storeMessage');
Route::get('/updated-activity', 'TelegramBotController@updatedActivity');
