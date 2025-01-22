<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\UserController;

Route::controller(UserController::class)->group(function(){
    Route::get('/', 'homePage')->name('home');

});