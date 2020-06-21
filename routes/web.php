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
    return view('index');
});
Route::get('/login', function () {
    return view('login');
});
Route::post('/login', 'Rest\LoginCtrl@login'); // thêm mới user clinic
Route::get('/detailUser', 'Rest\LoginCtrl@detailUser'); // thêm mới user clinic
Route::group(['prefix' => 'api/v1'], function () {
	//user
	Route::get('/listChat', 'Rest\ChatCtrl@listChat'); //danh sách user clinic
	Route::post('/insertChat', 'Rest\ChatCtrl@insertChat'); // thêm mới user clinic

	// login
	Route::get('/detailUser', 'Rest\LoginCtrl@detailUser'); // thêm mới user clinic

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
