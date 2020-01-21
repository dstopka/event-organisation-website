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
    return view('welcome');
});

Route::resource('/events','EventController')->middleware('auth');


Route::resource('/calendar', "CalendarController")->middleware('auth');
Route::resource('/event_date',"EventDateController",['only' => ['show','destroy']])->middleware('auth');
Route::resource('/tickets','TicketController')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/user/{id}/events','UserController@events');

Route::get('/event_date/{id}/join','EventDateController@joinOnEvent');//->middleware('auth');

Route::match(['get', 'post'],'/cart','TicketController@cart')->middleware('auth');
