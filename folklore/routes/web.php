<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\UserController;

Route::controller(UserController::class)->group(function(){
    Route::get('/', 'homePage')->name('home');
    Route::get('/userLogin', 'userLogin')->name('userLogin');
    Route::get('/userregistration', 'userregistration')->name('userregistration');
    Route::get('/contactus', 'contactus')->name('contactus');
    Route::get('/management', 'management')->name('management');
    Route::get('/newsevent', 'newsevent')->name('newsevent');
    Route::get('/gallerysec', 'gallerysec')->name('gallerysec');
    Route::get('/donate', 'donate')->name('donate');
    Route::get('/Publications', 'Publications')->name('Publications');
    Route::get('/aboutpage', 'aboutpage')->name('aboutpage');

});