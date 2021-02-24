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

Route::get('/', 'BooksController@books');
Route::get('books/{id}', 'BooksController@show')->name('books.show');

Route::resource('books','BooksController',['only' => ['store','destroy']])->middleware('auth');

Route::prefix('books')->name('books.')->group(function () {
    Route::put('/{book}/like', 'BooksController@like')->name('like')->middleware('auth');
    Route::delete('/{book}/like', 'BooksController@unlike')->name('unlike')->middleware('auth');
 // Route::post('/review', 'BooksController@reviews')->name('reviews')->middleware('auth');
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings', 'UsersController@followings')->name('followings');
        Route::get('followers', 'UsersController@followers')->name('followers');
    });
    
    Route::resource('users','UsersController',['only' => ['show','edit','update']]);
});