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


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/patient', 'HomeController@patient');

Route::get('/addpatient', 'HomeController@addpatient');

Route::get('/addcare', 'HomeController@addcare');

Route::get('/permits', 'HomeController@permits');

Route::post('/enterpatient', 'HomeController@enterpatient');

Route::post('/checkid', 'HomeController@checkid');

Route::post('/enterpermits', 'HomeController@enterpermits');




