<?php



Route::get('/', function () {
    return view('main');
});

Route::get('events')
    ->uses('EventController@all');