<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HistoryController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

//Base Pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/book', [BooksController::class, 'index'])->name('book');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

//Order Pages
Route::get('/order/{id}', [OrdersController::class, 'index'])-> where('id', '[0-9]+');
Route::post('/order/{id}', [OrdersController::class, 'store']);
Route::get('/checkout', [OrdersController::class, 'checkout']) ->name('checkout');
Route::delete('/checkout/remove/{id}', [OrdersController::class, 'remove']) ->name('remove');
Route::get('/checkout/confirm', [OrdersController::class, 'checkout_confirm']) ->name('checkout_confirm');

//User Pages
Route::post('/user', [UsersController::class, 'update'])->name('update');
Route::get('/user/profile', [UsersController::class, 'index'])->name('user');
Route::get('/user/{user}/edit', [UsersController::class, 'edit'])->name('user');

//History Pages
Route::get('/history', [HistoryController::class, 'index'])->name('history');
Route::get('/history/{id}', [HistoryController::class, 'details'])->name('history');

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
});

