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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//
//Route::get('/', function () {
//    return view('transaction.index');
//});
//
//Route::prefix('api')->group(function() {
//	Route::resource('transactions', 'Api\TransactionController');
//    // Route::resource('notes', 'Api\NotesController');
//    // Route::put('/notes/{note}/toggleFavourite', 'Api\NotesController@toggleFavourite');
//    // Route::get('/users', 'Api\UsersController@index');
//    // Route::get('/users/{user}/notes', 'Api\UsersController@getNotesByUser');
//    // Route::get('/users/{user}/getFavouriteNotesId', 'Api\NotesController@getFavouriteId');
//});
//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//});
//
//Route::get('/user', function () {
//    return view('user.index');
//});
//
//Route::get('/note', function() {
//   return view('note.index');
//})->name('note');

