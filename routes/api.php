<?php

//use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('transactions', 'TransactionController@index');
Route::post('/transactions/create','TransactionController@store');

//Route::post('/post/create','PostController@store');
//Route::get('transactions/{transaction}', 'TransactionController@show'); // Future functions if needed
//Route::put('transactions/{transaction}','TransactionController@update'); // Future functions if needed
//Route::delete('transactions/{transaction}', 'TransactionController@delete'); // Future functions if needed




//Route::get('/home', 'HomeController@index')->name('home');
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

