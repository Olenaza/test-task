<?php

Route::get('/',
    [
        'before' => 'auth',
        function() {
            return Redirect::to('events');
        }
    ]);

Route::get('login', 'SessionController@create');

Route::get('logout', 'SessionController@destroy');

Route::resource('session', 'SessionController', ['only' => ['create', 'store', 'destroy']]);


Route::group(['before' => 'auth'], function()
{
    Route::resource('events', 'MedicalEventController',
        [
            'except' => ['show', 'destroy']
        ]);
});
