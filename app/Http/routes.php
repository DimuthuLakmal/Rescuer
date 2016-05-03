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

Route::resource('users','UsersController');

Route::resource('warnings','WarningController');

Route::resource('prewarnings','PreWarningController');

Route::resource('forum','QuestionController');

Route::resource('answer','AnswerController');

Route::resource('mobilewarnings','MobileWarningController');

Route::resource('mobileforum','MobileQuestionController');

Route::controller('/','HomeController');



