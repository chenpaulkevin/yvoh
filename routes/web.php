<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LedgerController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;

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


Route::get('/', [PageController::class, 'index'])
    ->name('homepage');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	Route::get('map', function () {return view('pages.maps');})->name('map');
	Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

Route::get('/', 'App\Http\Controllers\HomeController@index')
	->name('home');

Route::get('/transactions', [PageController::class, 'fetchLedger'])
    ->name('transactions');

Route::post('/add-transactions', [TransactionController::class, 'store'])
    ->name('createtransactions');

Route::post('api/fetch-banks', [PageController::class, 'fetchBank']);

Route::get('/view-ledgers', [PageController::class, 'viewLedger'])
    ->name('viewledger');

Route::get('/add-ledgers', [PageController::class, 'addLedger'])
    ->name('addledger');

Route::get('/view-banks', [PageController::class, 'viewBank'])
    ->name('viewbank');

Route::get('/add-banks', [PageController::class, 'addBank'])
    ->name('addbank');

Route::get('/add-users', [PageController::class, 'addUser'])
    ->name('adduser');

Route::post('/add-users', [UserController::class, 'store'])
    ->name('createuser');

Route::post('/add-ledgers', [LedgerController::class, 'store'])
    ->name('createledger');

Route::post('/add-banks', [BankController::class, 'store'])
    ->name('createbankaccount');

Route::get('/view-users', [PageController::class, 'viewUser'])
    ->name('viewuser');


});

