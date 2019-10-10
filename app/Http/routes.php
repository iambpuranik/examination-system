<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//landing page
Route::get('/', function () {
    return view('login');
});
//validate login
Route::post('/login', [
    'as' => 'validateLogin', 'uses' => 'LoginController@validateLogin'
]);
//logout
Route::get('/logout', [
    'as' => 'logout', 'uses' => 'LoginController@logout'
]);

//routes accessible for user only
Route::group(['middleware' => 'user'], function () {
    //after user log in
    Route::get('/user', [
        'as' => 'user.index', 'uses' => 'UsersController@index'
    ]);
    //start exam
    Route::get('/user/start-exam/{examId}', [
        'as' => 'user.start.exam', 'uses' => 'UsersController@startExam'
    ]);
    //submit exam response
    Route::post('/user/start-exam/{examId}', [
        'as' => 'user.start.exam', 'uses' => 'UsersController@endExam'
    ]);
});
//routes accessible for admin only
Route::group(['middleware' => 'admin'], function () {
    //admin landing page
    Route::get('/admin', function () {
        return view('admin.index');
    });
    //user create
    Route::get('/admin/create-user', function () {
        return view('admin.users.create');
    });
    Route::post('/admin/create-user', [
        'as' => 'admin.create.user', 'uses' => 'AdminController@createUser'
    ]);
    //user exam
    Route::get('/admin/create-exam', function () {
        return view('admin.exam.create');
    });
    Route::post('/admin/create-exam', [
        'as' => 'admin.create.exam', 'uses' => 'AdminController@createExam'
    ]);
    //user question
    Route::get('/admin/create-question', [
        'as' => 'admin.create.question', 'uses' => 'AdminController@createQuestion'
    ]);
    Route::post('/admin/create-question', [
        'as' => 'admin.store.question', 'uses' => 'AdminController@storeQuestion'
    ]);
    //assigned exam
    Route::get('/admin/assign-exam', [
        'as' => 'admin.assign.exam', 'uses' => 'AdminController@createAssignExam'
    ]);
    Route::post('/admin/assign-exam', [
        'as' => 'admin.assign.exam', 'uses' => 'AdminController@storeAssignExam'
    ]);
    //user response
    Route::get('/admin/user-response', [
        'as' => 'admin.user.response', 'uses' => 'AdminController@userResponse'
    ]);
});


