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


Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'AngularController@serveApp');

    Route::get('/unsupported-browser', 'AngularController@unsupported');

});


//public API routes
$api->group(['middleware' => ['api']], function ($api) {

    // Authentication Routes...

    $api->post('auth/register', 'Auth\AuthController@register');
    $api->post('auth/login', 'Auth\AuthController@login');

    // Password Reset Routes...
    $api->post('auth/password/email', 'Auth\PasswordResetController@sendResetLinkEmail');
    $api->get('auth/password/verify', 'Auth\PasswordResetController@verify');
    $api->post('auth/password/reset', 'Auth\PasswordResetController@reset');

    $api->group(['prefix' => 'student'], function ($api) {
        $api->match(['get', 'post'], '/', 'StudentController@getStudent');
        $api->match(['get', 'post'], '/{student_id}', 'StudentController@getStudent')->where('student_id', '[0-9]+');
        $api->match(['get', 'post'], '/{student_id}/validate/{token}', 'StudentController@validateStudentCompte')->where('student_id', '[0-9]+');
        $api->post('/{student_id}/upload-photo', 'StudentController@uploadPhoto')->where('student_id', '[0-9]+');
        // /api/student/create
        $api->post('/create', 'StudentController@add');
    });
});

//protected API routes with JWT (must be logged in)
$api->group(['middleware' => ['api', 'api.auth']], function ($api) {
    Route::post('student/{student_id}/upload-photo', 'StudentController@uploadPhoto')->where('student_id', '[0-9]+');
});

$api->group(['prefix' => 'student'], function ($api) {
    // /api/student
    $api->match(['get', 'post'], '/', 'StudentController@getStudent');
    // /api/student/{student_id}
    $api->match(['get', 'post'], '/{student_id}', 'StudentController@getStudent')->where('student_id', '[0-9]+');

    // get registration init data
    $api->get('/create', 'StudentController@init');
});
