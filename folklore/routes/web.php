<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

Route::controller(UserController::class)->group(function(){
    Route::get('/', 'homePage')->name('home');
    Route::get('/login', 'login')->name('login');
    Route::get('/userregistration', 'userregistration')->name('userregistration');
    Route::get('/contactus', 'contactus')->name('contactus');
    Route::get('/management', 'management')->name('management');
    Route::get('/newsevent', 'newsevent')->name('newsevent');
    Route::get('/gallerysec', 'gallerysec')->name('gallerysec');
    Route::get('/donate', 'donate')->name('donate');
    Route::get('/Publications', 'Publications')->name('Publications');
    Route::get('/aboutpage', 'aboutpage')->name('aboutpage');

    //Backend
    Route::post('/userRegister', 'userRegister')->name('userRegister');
    Route::post('/userLogin',  'userLogin')->name('userLogin');
  
    //Profile

});

Route::controller(ProfileController::class)->group(function(){
    
    Route::middleware(['auth'])->group(function () {
        Route::get('/userDhashboard',  'userDhashboard')->name('userDhashboard');
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/profile', 'profile')->name('profile');
        Route::put('/updateProfile', 'updateProfile')->name('updateProfile');
        Route::post('/logout', 'logout')->name('logout');

        Route::get('changePassword',  'showChangePasswordForm')->name('changePassword');
        Route::post('update-password', 'updatePassword')->name('updatePassword');
    });


});