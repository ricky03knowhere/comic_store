<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
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

// dd(User::where('id', ));
// $dashboard = ( Auth::user() ->status == 1 ) ? 'adminHome' : 'home';

//Base Pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'customer'])->name('home');
Route::get('admin/home', [HomeController::class, 'admin'])->name('admin.home') ->middleware('is_admin');

//Comic Pages
Route::get('/store', [BooksController::class, 'index'])->name('comic');
Route::post('/comic/save', [BooksController::class, 'store'])->name('comic')  ->middleware('is_admin');
Route::get('/comic/detail/{id}', [BooksController::class, 'show'])->name('comic')  ->middleware('is_admin');
Route::get('/comic/edit/{id}', [BooksController::class, 'edit'])->name('comic')  ->middleware('is_admin');
Route::delete('/comic/delete/{id}', [BooksController::class, 'destroy'])->name('comic')  ->middleware('is_admin');
Route::post('/comic/update/{id}', [BooksController::class, 'update'])->name('comic')  ->middleware('is_admin');

//Order Pages
Route::get('/order/{id}', [OrdersController::class, 'index'])-> where('id', '[0-9]+');
Route::post('/order/{id}', [OrdersController::class, 'store']);
Route::get('/checkout', [OrdersController::class, 'checkout']) ->name('checkout');
Route::delete('/checkout/remove/{id}', [OrdersController::class, 'remove']) ->name('remove');
Route::get('/checkout/confirm', [OrdersController::class, 'checkout_confirm']) ->name('checkout_confirm');

//Transaction pages
Route::get('/transactions/list', [TransactionController::class, 'index']) ->name('transactions')  ->middleware('is_admin');
Route::get('/transactions/details/{id}', [TransactionController::class, 'show']) ->name('transactions')  ->middleware('is_admin');
Route::get('/transactions/edit/{id}', [TransactionController::class, 'edit']) ->name('transactions')  ->middleware('is_admin');
Route::post('/transactions/update/{id}', [TransactionController::class, 'update']) ->name('transactions')  ->middleware('is_admin');

//User Pages
Route::get('/users/list', [UsersController::class, 'index'])->name('users') ->middleware('is_admin');
Route::get('/user/history/{id}', [UsersController::class, 'history'])->name('users') ->middleware('is_admin');
Route::get('/user/details/{id}', [UsersController::class, 'show'])->name('users') ->middleware('is_admin');
Route::delete('/user/delete/{id}', [UsersController::class, 'destroy'])->name('users') ->middleware('is_admin');


//User Guest Pages
Route::post('/profile/update', [ProfileController::class, 'update'])->name('update');
Route::get('/profile/details', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile/edit', [UsersController::class, 'edit'])->name('profile');

//History Pages
Route::get('/history', [HistoryController::class, 'index'])->name('history');
Route::get('/history/{id}', [HistoryController::class, 'details'])->name('history');

//Admin Page
Route::get('/comics/list', [BooksController::class, 'bookList'])->name('comic')  ->middleware('is_admin');;


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile', 'uses' => 'App\Http\Controllers\ProfileController@index']);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});