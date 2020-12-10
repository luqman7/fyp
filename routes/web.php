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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/parent', 'ParentController@index')->name('parent');


Route::resource('newborns', 'NewbornsController');
Route::resource('admins', 'AdminController');

//Route::delete('/newborns/{newborn}', 'NewbornsController@destroy')->name('newborns.destroy')->middleware('auth');
