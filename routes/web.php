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

Route::get('/', 'TopicsController@index')->name('root');

// 用户认证
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// 用户注册
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// 密码重置
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// 用户
Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit']]);

// 话题
Route::resource('topics', 'TopicsController', ['only' => ['index', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::post('upload_image', 'TopicsController@uploadImage')->name('topics.upload_image');
Route::get('topics/{topic}/{slug?}', 'TopicsController@show')->name('topics.show');

// 分类
Route::resource('categories', 'CategoriesController', ['only' => ['show']]);

// 回复
Route::resource('replies', 'RepliesController', ['only' => ['store', 'destroy']]);

// 通知
Route::resource('notifications', 'NotificationsController', ['only' => ['index']]);

// 无权限登录
Route::get('permission-denied', 'PagesController@permissionDenied')->name('permission-denied');