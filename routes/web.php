<?php



Route::get('/', function () {
    return view('main');
});

Route::group(['prefix' => 'api'], function() {

    Route::get('all')
        ->uses('ApiController@all');

    Route::get('events')
        ->uses('ApiController@list');

    Route::get('lunar')
        ->uses('ApiController@lunar');
});


