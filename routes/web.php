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

Route::get('/vital', 'HomeController@vital');

Route::get('/nurse', 'HomeController@nurse');

Route::get('/healthrecord', 'HomeController@healthrecord');

Route::get('/authorization', 'HomeController@authorization');

Route::get('/print_authorization', 'HomeController@print_authorization');

Route::get('/voucher', 'HomeController@voucher');

Route::get('/print_voucher', 'HomeController@print_voucher');

Route::post('/enterpatient', 'HomeController@enterpatient');

Route::post('/checkid', 'HomeController@checkid');

Route::post('/enterpermits', 'HomeController@enterpermits');

Route::post('/checkvital', 'HomeController@checkvital');

Route::post('/addnursedata', 'HomeController@addnursedata');

Route::post('/addDept', 'HomeController@addDept');

Route::post('/enterdept', 'HomeController@enterdept');

Route::post('/addauthorization', 'HomeController@addauthorization');

Route::post('/entervoucher', 'HomeController@entervoucher');




