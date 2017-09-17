<?php

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

// Routes control Login and register

Route::group(['middleware' => 'checklogin:0'], function() {

    // Get login
    Route::get('/', ['as' => 'getLogin', 'uses' => 'HomeController@getLogin']);

    // Post login
    Route::post('/PostLogin', ['as' => 'setLogin', 'uses' => 'HomeController@setLogin']);

    // Get register
    Route::get('/register', ['as' => 'getRegister', 'uses' => 'HomeController@getRegister']);

    // Post register
    Route::post('/PostRegister', ['as' => 'setRegister', 'uses' => 'HomeController@setRegister']);

});

// Get logout
Route::get('/logout', ['as' => 'logout', 'uses' => 'HomeController@logout']);

// Get and Post send mail change password
Route::get('/sendChangePassword', ['as' => 'getSendChangePassword', 'uses' => 'HomeController@getSendChangePassword']);

Route::post('/PostSendChangePassword', ['as' => 'setSendChangePassword', 'uses' => 'HomeController@setSendChangePassword']);

// Get and Post change password
Route::get('/changePasswordEmail/{token}', ['as' => 'getChangePasswordEmail', 'uses' => 'HomeController@getChangePasswordEmail']);

Route::post('/PostChangePasswordEmail/{id}', ['as' => 'setChangePasswordEmail', 'uses' => 'HomeController@setChangePasswordEmail']);

// Routes control (Admin)
Route::group(['middleware' => ['checklogin:1', 'getProfile'], 'prefix' => 'admin'], function() {

	//Route Control (Admin)
    Route::get('/', ['as' => 'getIndexAdmin', 'uses' => 'HomeController@getIndexAdmin']);

    //Route Control (Admin/Users)
    Route::group(['namespace' => 'Admin', 'prefix' => 'users'], function() {

        // Page controller user -> database User

    	Route::get('/', ['as' => 'users.getIndex', 'uses' => 'UsersController@getIndex']);
        Route::get('/view/{id}', ['as' => 'users.getView', 'uses' => 'UsersController@getView']);

        Route::get('/create', ['uses' => 'UsersController@getCreate']);
        Route::post('/PostCreate', ['as' => 'users.setCreate', 'uses' => 'UsersController@setCreate']);

        Route::get('/update/{id}', ['as' => 'users.getUpdate', 'uses' => 'UsersController@getUpdate']);
        Route::post('/PostUpdate/{id}', ['as' => 'users.setUpdate', 'uses' => 'UsersController@setUpdate']);

        Route::get('/delete/{id}', ['as' => 'users.getDelete', 'uses' => 'UsersController@getDelete']);
        Route::post('/deleteall', ['as' => 'users.getDeleteAll', 'uses' => 'UsersController@getDeleteAll']);
        
        Route::get('/deleteImg/{id}', ['as' => 'users.getDeleteImg', 'uses' => 'UsersController@getDeleteImg']);
        Route::get('/resetPass/{id}', ['as' => 'users.getResetPass', 'uses' => 'UsersController@getResetPass']);

        Route::get('/profile', ['as' => 'users.getProfile', 'uses' => 'UsersController@getProfile']);
        Route::post('/PostProfile/{id}', ['as' => 'users.setProfile', 'uses' => 'UsersController@setProfile']);

        Route::get('/changePassword', ['as' => 'users.getChangePassword', 'uses' => 'UsersController@getChangePassword']);
        Route::post('/PostChangePassword', ['as' => 'users.setChangePassword', 'uses' => 'UsersController@setChangePassword']);

        Route::post('/PostChangeImage', ['as' => 'users.setChangeImage', 'uses' => 'UsersController@setChangeImage']);

        // Page controller user - > import & export -> excel
        
        Route::get('/ExportTableUser', ['as' => 'users.getExportTableUser', 'uses' => 'ExcelsController@getExportTableUser']);

    });
});

// Routes control (Member)
Route::group(['middleware' => ['checklogin:2', 'getProfile'], 'prefix' => 'member'], function() {
	//Route Control (Member)
    Route::get('/', ['as' => 'getIndexMember', 'uses' => 'HomeController@getIndexMember']);
});
