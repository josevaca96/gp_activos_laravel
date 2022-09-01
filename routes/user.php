<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

 Route::get('users', 'UserController@index')->name('users.index');
Auth::routes();

Route::middleware(['auth'])->group(function(){   
    
    //Users
    
   
        //     ->middleware('can:users.index');

    Route::put('users/{user}', 'UserController@update')->name('users.update')
            ->middleware('can:users.edit');

    Route::get('users/{user}', 'UserController@show')->name('users.show')
            ->middleware('can:users.show');
    
    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
            ->middleware('can:users.destroy');

    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
            ->middleware('can:users.edit');     
   
});
