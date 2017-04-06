<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/* user must be authenticated to even beging using the notes */
Route::group(['prefix'=> 'notes','middleware' => ['auth']], function () {
    //Route::resource('notes', 'NotesController');

    Route::get('/', 'NotesController@index')->name('notes.index');
    Route::get('/{id}', 'NotesController@show')->name('notes.show')->middleware('owner');
    Route::post('/', 'NotesController@store')->name('notes.store');
    Route::get('/{id}/edit', 'NotesController@edit')->name('notes.edit')->middleware('owner');
    Route::get('/create', 'NotesController@create')->name('notes.create');
    Route::put('/{id}', 'NotesController@update')->name('notes.update')->middleware('owner');
    Route::delete('/{id}', 'NotesController@delete')->name('notes.delete')->middleware('owner');
});

Route::get('login', 'Auth\AuthController@login')->name('login');
Route::post('login', 'Auth\AuthController@postLogin')->name('postLogin');

Route::get('logout', 'Auth\AuthController@logout');