<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminAuthController;

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


        Route::get('/joinclass', 'joinclass')->name('joinclass');
        Route::get('/assignment', 'assignment')->name('assignment');
        Route::get('/book', 'book')->name('book');
        Route::get('/courseplan', 'courseplan')->name('courseplan');

    });

  


    Route::controller(AdminAuthController::class)->group(function () {
        Route::get('adminLogin', 'adminLogin')->name('adminlogin');
        Route::post('plogin', 'plogin')->name('plogin');
        Route::post('adminlogout', 'adminlogout')->name('adminlogout');
        Route::get('/adminDashboard', 'adminDashboard')->name('adminDashboard')->middleware(\App\Http\Middleware\AdminAuthMiddleware::class);
        Route::get('/adminmenu', 'adminmenu')->name('adminmenu')->middleware(\App\Http\Middleware\AdminAuthMiddleware::class);

        Route::get('/admin', 'admin')->name('admin')->middleware(\App\Http\Middleware\AdminAuthMiddleware::class);
        Route::post('/adminchangeStatus', 'adminchangeStatus')->name('adminchangeStatus')->middleware(\App\Http\Middleware\AdminAuthMiddleware::class);
        Route::post('/addAdmin', 'addAdmin')->name('addAdmin')->middleware(\App\Http\Middleware\AdminAuthMiddleware::class);
        Route::post('/delete-admin', 'deleteAdmin')->name('admin.delete')->middleware(\App\Http\Middleware\AdminAuthMiddleware::class);


        Route::get('/adminCourse', 'adminCourse')->name('adminCourse')->middleware(\App\Http\Middleware\AdminAuthMiddleware::class);
        Route::post('/storeCourse', 'storeCourse')->name('storeCourse')->middleware(\App\Http\Middleware\AdminAuthMiddleware::class);
        Route::post('/deleteCourse', 'deleteCourse')->name('deleteCourse')->middleware(\App\Http\Middleware\AdminAuthMiddleware::class);
        Route::post('/coursechangeStatus', 'coursechangeStatus')->name('coursechangeStatus')->middleware(\App\Http\Middleware\AdminAuthMiddleware::class);

        Route::get('/adminGallery', 'adminGallery')->name('adminGallery')->middleware(\App\Http\Middleware\AdminAuthMiddleware::class);
        Route::post('/storeGallery', 'storeGallery')->name('storeGallery')->middleware(\App\Http\Middleware\AdminAuthMiddleware::class);
        Route::delete('/images/{id}', 'destroyGallery')->name('images.destroy')->middleware(\App\Http\Middleware\AdminAuthMiddleware::class);
        Route::post('/gallerychangeStatus', 'gallerychangeStatus')->name('gallerychangeStatus')->middleware(\App\Http\Middleware\AdminAuthMiddleware::class);


        Route::get('/adminNews', 'adminNews')->name('adminNews')->middleware(\App\Http\Middleware\AdminAuthMiddleware::class);
        Route::post('/news/store', 'storeNews')->name('storeNews')->middleware(\App\Http\Middleware\AdminAuthMiddleware::class);
        Route::delete('/news/{id}', 'destroyNews')->name('news.destroy')->middleware(\App\Http\Middleware\AdminAuthMiddleware::class);
        Route::post('/toggleStatusNews','toggleStatusNews')->name('toggleStatusNews')->middleware(\App\Http\Middleware\AdminAuthMiddleware::class);

        Route::get('adminebook', 'adminebook')->name('adminebook')->middleware(\App\Http\Middleware\AdminAuthMiddleware::class);
        Route::delete('/admin/ebooks/{id}', 'destroyEbook')->name('ebooks.destroy')->middleware(\App\Http\Middleware\AdminAuthMiddleware::class);
        Route::post('storeEbook','storeEbook')->name('storeEbook')->middleware(\App\Http\Middleware\AdminAuthMiddleware::class);
        Route::post('/admin/ebooks/toggle/{id}',  'toggleStatusEbook')->name('ebooks.toggle')->middleware(\App\Http\Middleware\AdminAuthMiddleware::class);
        Route::get('adminSearchEbook','adminSearchEbook')->name('adminSearchEbook') ->middleware(\App\Http\Middleware\AdminAuthMiddleware::class);



        
    });
    

   




});