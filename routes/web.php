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

Route::get('/', 'App\Http\Controllers\FundController@showFundraisers');

// Authentication Routes...
Route::get('superlogin', [ 'as' => 'login', 'uses' => 'App\Http\Controllers\Auth\LoginController@showLoginForm']);
Route::post('superlogin', [ 'as' => 'login', 'uses' => 'App\Http\Controllers\Auth\LoginController@login']);
Route::post('logout', [ 'as' => 'logout', 'uses' => 'App\Http\Controllers\Auth\LoginController@logout']);
	
Route::post('/add-fund', 'App\Http\Controllers\FundController@add_fund');
Route::get('/getFund/{id}', 'App\Http\Controllers\FundController@getFund')->name('fund.get');

Route::group(['middleware' => ['auth','admin']], function(){
	Route::delete('/deleteFund/{id}', 'App\Http\Controllers\FundController@destroy')->name('fund.destroy');
	Route::put('/approveRejectFund/{id}', 'App\Http\Controllers\FundController@approveRejectFund')->name('fund.approveRejectFund');
	Route::post('/updateFund', 'App\Http\Controllers\FundController@updateFund');
	Route::post('/inlineEditor', 'App\Http\Controllers\FundController@inlineEditor');
});




  


