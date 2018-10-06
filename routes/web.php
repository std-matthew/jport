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

Route::get('/', 'PageController@index');
Route::post('/notify/{user}', 'PageController@notify')->name('user.notify');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
	Route::get('user', 'UserController@show')->name('user.show');
	Route::post('user', 'UserController@update')->name('user.update');
	
	Route::get('user/notifications', 'UserController@showNotifications')->name('user.notifications.index');
	Route::get('user/password', 'UserController@showPassword')->name('user.password.show');
	Route::post('user/password', 'UserController@updatePassword')->name('user.password.update');

	Route::get('user/settings', 'SettingController@show')->name('settings.show');
	Route::post('user/settings', 'SettingController@update')->name('settings.update');

	Route::get('user/main', 'UserMainController@show')->name('main.show');
	Route::post('user/main', 'UserMainController@update')->name('main.update');

	Route::get('user/intro', 'UserIntroController@show')->name('intro.show');
	Route::post('user/intro', 'UserIntroController@update')->name('intro.update');

	Route::get('user/work', 'UserWorkController@show')->name('work.show');
	Route::post('user/work', 'UserWorkController@update')->name('work.update');

	Route::get('user/about', 'UserAboutController@show')->name('about.show');
	Route::post('user/about', 'UserAboutController@update')->name('about.update');

	Route::get('user/contact', 'UserContactController@show')->name('contact.show');
	Route::post('user/contact', 'UserContactController@update')->name('contact.update');

	Route::get('user/social', 'UserSocialController@show')->name('social.show');
	Route::post('user/social', 'UserSocialController@store')->name('social.store');
	Route::post('user/social/{id}', 'UserSocialController@destroy')->name('social.destroy');
});