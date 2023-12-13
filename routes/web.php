<?php

use Illuminate\Support\Facades\Route;



Route::get('/setup', 'Frontend\HomeController@Setup')->name('setup');
Route::post('/setup', 'Frontend\HomeController@SaveSetup')->name('setup.save');

Route::get('/', 'Frontend\HomeController@login')->middleware(['CheckSetup'])->name('login');
Route::post('/', 'Frontend\HomeController@SignIn')->name('signIn');

Route::middleware('CheckAuth')->group(function(){
    
    Route::prefix('dashboard')->name('dashboard.')->group(function(){
        Route::post('/logout', 'Dashboard\HomeController@logout')->name('logout');
        Route::get('/', 'Dashboard\HomeController@index')->name('index');
        Route::get('/rows', 'Dashboard\HomeController@rows')->name('rows');
        Route::get('/subjects', 'Dashboard\HomeController@subjects')->name('subjects');
        Route::get('/attendance', 'Dashboard\HomeController@attendance')->name('attendance');
        Route::get('/todayReset', 'Dashboard\HomeController@todayReset')->name('todayReset');
        Route::get('/monthlyReset', 'Dashboard\HomeController@monthlyReset')->name('monthlyReset');
        Route::get('/students', 'Dashboard\HomeController@students')->name('students');
        Route::get('/teachers', 'Dashboard\HomeController@teachers')->name('teachers');
        Route::get('/teacherStudent', 'Dashboard\HomeController@teacherStudent')->name('teacherStudent');
        Route::get('/invoice', 'Dashboard\HomeController@invoice')->name('invoice');
        Route::get('/members', 'Dashboard\HomeController@members')->name('members');
        Route::get('/profile', 'Dashboard\HomeController@profile')->name('profile');
        

    });
    
    
});
