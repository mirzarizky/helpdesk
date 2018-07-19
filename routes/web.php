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

Route::get('/', 'HomeController@index')->name('home');
Route::group(['middleware' => ['web']], function () {
    Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);
});


Route::get('faq', ['uses' => 'HomeController@faq','as' => 'aq']);

Route::group(['middleware' => ['auth']], function () {
  Route::get('member', 'UserProfileController@index')->name('member');
  Route::get('member/profile', 'UserProfileController@viewProfile')->name('view-profile');
  Route::post('member/profile', 'UserProfileController@editProfile')->name('edit-profile');
  Route::get('member/change-password', 'UserProfileController@viewPassword')->name('view-password');
  Route::post('member/change-password', 'UserProfileController@editPassword')->name('edit-password');
  Route::post('member/change-avatar', 'UserProfileController@editAvatar')->name('edit-avatar');
});

Route::get('topics/detail/{slug}', ['uses' => 'TopicsController@detail','as' => 'topics']);
Route::get('topics/search', ['uses' => 'TopicsController@search','as' => 'topics-search']);
Route::get('topics/livesearch', ['uses' => 'TopicsController@livesearch','as' => 'topics-search']);
Route::get('topics/category/{slug}', ['uses' => 'TopicsController@category','as' => 'topics-category']);
Route::get('topics/reaction/{type}/{id}', ['as' => 'topics.reaction', 'uses' => 'TopicsController@reaction']);

Route::get('mobile/{id}', ['as' => 'topics.mobile', 'uses' => 'TopicsController@mobile']);
Route::get('mobile/category/{id}/{slug}', ['as' => 'topics.mobile-category', 'uses' => 'TopicsController@mobile_category']);
Route::get('mobile/detail/{id}/{slug}', ['as' => 'topics.mobile-detail', 'uses' => 'TopicsController@mobile_detail']);


Route::post('/storeFile','FileController@storeFile')->name('storeFile');
Route::delete('/deleteFile/{id}','FileController@deleteFile')->name('deleteFile');

Auth::routes();

Route::get('auth/activate', 'Auth\ActivationController@activate')->name('auth.activate');
Route::get('auth/activate/resend', 'Auth\ActivationResendController@showResendForm')->name('auth.activate.resend');
Route::post('auth/activate/resend', 'Auth\ActivationResendController@resend');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
