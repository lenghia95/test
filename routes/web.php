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
Route::resource('users', 'Usercontroller');
Route::put('ajax/user-edit/{id}', 'Usercontroller@ajaxEdit');
Route::put('ajax/user-show/{id}', 'Usercontroller@ajaxShow');
Route::get('ajax/user-check-email', 'Usercontroller@checkEmail');





Route::get('/', function () {
    return view('welcome');
});
