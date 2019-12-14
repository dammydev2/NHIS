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
	return view('index');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/user', 'HomeController@user');

Route::get('/adduser', 'HomeController@adduser');

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

Route::get('/reffer', 'HomeController@reffer');

Route::get('/print_voucher', 'HomeController@print_voucher');

Route::get('/doctor', 'HomeController@doctor');

Route::get('/printrec', 'HomeController@printrec');

Route::get('/checkprint', 'HomeController@checkprint');

Route::get('/prescribe', 'HomeController@prescribe');

Route::get('/printprescribe', 'HomeController@printprescribe');

Route::get('/ICD', 'HomeController@ICD');

Route::get('/operations', 'HomeController@operations');

Route::get('/addcode', 'HomeController@addcode');

Route::get('/printICD', 'HomeController@printICD');

Route::get('/history', 'HomeController@history');

Route::get('/addICDreport', 'HomeController@addICDreport');

Route::get('/statistics', 'HomeController@statistics');

Route::get('/slot/{id}', 'HomeController@slot');

Route::get('/addDiag', 'HomeController@addDiag');

Route::get('/delete/{id}', 'HomeController@delete');

Route::get('/slot_edit/{id}', 'HomeController@slot_edit');

Route::post('/enterpatient', 'HomeController@enterpatient');

Route::post('/checkid', 'HomeController@checkid');

Route::post('/enterpermits', 'HomeController@enterpermits');

Route::post('/checkvital', 'HomeController@checkvital');

Route::post('/addnursedata', 'HomeController@addnursedata');

Route::post('/addDept', 'HomeController@addDept');

Route::post('/enterdept', 'HomeController@enterdept');

Route::post('/addauthorization', 'HomeController@addauthorization');

Route::post('/entervoucher', 'HomeController@entervoucher');

Route::post('/enterslot', 'HomeController@enterslot');

Route::post('/adddoctordata', 'HomeController@adddoctordata');

Route::post('/addrefdata', 'HomeController@addrefdata');

Route::post('/verifyprint', 'HomeController@verifyprint');

Route::post('/addprescribe', 'HomeController@addprescribe');

Route::post('/addICD', 'HomeController@addICD');

Route::post('/entercode', 'HomeController@entercode');

Route::post('/addoperation', 'HomeController@addoperation');

Route::post('/viewhistory', 'HomeController@viewhistory');

Route::post('/checkpatient', 'HomeController@checkpatient');

Route::post('/checkhistory', 'HomeController@checkhistory');

Route::post('/checkstat', 'HomeController@checkstat');

Route::post('/enterdiagnosis', 'HomeController@enterdiagnosis');

Route::post('/addDiagnosis', 'HomeController@addDiagnosis');

Route::post('/enteruser', 'HomeController@enteruser');

Route::post('/slotupdate', 'HomeController@slotupdate');

Route::post('/checksug', 'HomeController@checksug');




