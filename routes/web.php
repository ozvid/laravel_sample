<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'frontend\IndexController@index');

Route::group(['middleware' => 'guest'], function() {
    Route::view('/login', 'frontend.auth.login');
    Route::post('/login', 'frontend\AuthController@actionLogin');
    Route::view('/register', 'frontend.auth.register');
    Route::post('/register', 'frontend\AuthController@saveUser');
    Route::view('/forgot-password', 'frontend.auth.forgot-password');
    Route::post('/forgot-password', 'frontend\AuthController@forgotPassword');
    Route::get('/password-reset/{token}', 'frontend\AuthController@resetPassword');
    Route::post('/password-reset/{token}', 'frontend\AuthController@updateUserPassword');
    Route::get('/add-admin', 'frontend\AuthController@addAdmin');
    Route::post('/add-admin', 'frontend\AuthController@saveAdmin');
});

Route::group(['middleware' => 'login'], function() {
    Route::get('/logout', function(){
        Auth::logout();
        return redirect('/')->with('success', 'Logout Succesfully');
    });
    
    /* Admin routes */
    Route::group(['prefix' => 'admin'], function()
    {
    
            Route::view('/', 'admin.index');
            
            /* Users Route */
            Route::get('users', 'admin\UserController@all');
            Route::get('user/edit/{id}', 'admin\UserController@edit');
            Route::post('user/edit/{id}', 'admin\UserController@update');
            Route::get('user/delete/{id}', 'admin\UserController@delete');
            Route::view('user/add', 'admin.users.add');
            Route::post('user/add', 'admin\UserController@save');
            Route::get('user/{id}', 'admin\UserController@view');
            Route::get('/changePassword/{id}', 'admin\UserController@changePassword');
            Route::post('/changePassword/{id}', 'admin\UserController@updatePassword');
            Route::get('profile', 'admin\UserController@myProfile');
            
    });
});

