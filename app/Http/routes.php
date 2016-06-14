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
//route for signout
Route::get('auth/logout','Auth\AuthController@logout');

//route for creating users and access user db
Route::resource('users','UsersController');

//route for view all users and access user db
Route::get('viewallusers','UsersController@viewAllUsers');

//route for view all users and access user db
Route::get('subscriber','UsersController@storeSubscribers');

//route for creating warnings and access warnigns db
Route::resource('warnings','WarningController');

//route for analyse warnings details
Route::resource('prewarnings','PreWarningController');

//route for retureive and store questions
Route::resource('forum','QuestionController');

//route for retureive and store answers
Route::resource('answer','AnswerController');

//route for retureive and store and update relief centers
Route::resource('reliefcenter','ReliefCenterController');

//route for retureive warnings for mobile
Route::resource('mobilewarnings','MobileWarningController');

//route for retureive and store questions and answers for mobile
Route::resource('mobileforum','MobileQuestionController');

//route for mobile signup with notifications
Route::get('mobileuser/username/{username}/password/{password}/repassword/{repassword}/mobile/{mobile}','MobileUserController@store');

//route for mobile signup without notification
Route::get('mobileuser/username/{username}/password/{password}/repassword/{repassword}','MobileUserController@storeWithoutMobile');

//route for mobile login
Route::get('mobileuser/username/{username}/password/{password}','MobileUserController@checklogin');

//route for mobile question store
Route::get('mobileforum/description/{description}/user_id/{user_id}/type/{type}','MobileQuestionController@store');

//route for mobile answer store
Route::get('mobileforum/description/{description}/user_id/{user_id}/q_id/{q_id}','MobileAnswerController@store');

//route for store victim details
Route::get('victims/user_id/{user_id}/victims_amount/{victims_amount}/lat/{lat}/lan/{lan}/contact_number/{contact_number}/type/{type}/address/{address}','VictimController@store');

//route for retrieve relief centers details
Route::get('reliefcentermobile/lat/{lat}/lan/{lan}/max/{max}','ReliefCenterController@getMobile');

//route for retrieve victim details
Route::resource('victims','VictimController');

//route for store and retireve rescue center details
Route::resource('rescuecenter','RescueCenterController');

//route for retreive news details
Route::resource('news','NewsController');

//route for news for mobile
Route::get('mobilenews/all','NewsController@getMobileAll');

//route for retreive specific news for mobile
Route::get('mobilenews/id/{id}','NewsController@getMobile');

//route for rescue center details for mobile
Route::get('mobile_rescue_center/town/{town}/type/{type}','RescueCenterController@getMobile');

//route for get victim longitude and latitude for index.php
Route::get('victimmap','VictimController@getForMap');

Route::get('notificationforum','QuestionController@getNotification');

Route::get('notificationprewarnings','PreWarningController@getNotification');

Route::get('notificationusers','UsersController@countUnaccepted');

Route::get('notificationvictims','VictimController@victimCount');

Route::get('victimscount','VictimController@victimAllCount');

Route::get('reliefcount','ReliefCenterController@getCount');

Route::controller('/','HomeController');



