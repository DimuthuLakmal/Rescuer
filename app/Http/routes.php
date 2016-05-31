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

//route for creating users and access user db
Route::resource('users','UsersController');

//route for creating warnings and access warnigns db
Route::resource('warnings','WarningController');

//route for analyse warnings details
Route::resource('prewarnings','PreWarningController');

//route for forum
Route::resource('forum','QuestionController');

Route::resource('answer','AnswerController');

Route::resource('reliefcenter','ReliefCenterController');

Route::resource('mobilewarnings','MobileWarningController');

Route::resource('mobileforum','MobileQuestionController');

Route::get('mobileforum/description/{description}/user_id/{user_id}/type/{type}','MobileQuestionController@store');

Route::get('mobileforum/description/{description}/user_id/{user_id}/q_id/{q_id}','MobileAnswerController@store');

Route::get('victims/user_id/{user_id}/victims_amount/{victims_amount}/lat/{lat}/lan/{lan}/contact_number/{contact_number}/type/{type}/address/{address}','VictimController@store');

Route::get('reliefcentermobile/lat/{lat}/lan/{lan}/max/{max}','ReliefCenterController@getMobile');

Route::resource('victims','VictimController');

Route::resource('rescuecenter','RescueCenterController');

Route::resource('news','NewsController');

Route::get('mobilenews/all','NewsController@getMobileAll');

Route::get('mobilenews/id/{id}','NewsController@getMobile');

Route::controller('/','HomeController');



