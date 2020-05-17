<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Admin\LoginController@login');
//logout
//Route::get('/admin/logout', 'Admin\LoginController@logout')->name('admin.logout');


//============== FRONTEND =====================================

Route::get('/', 'Frontend\Index@home')->name('frontend_home');

//============== ADMIN ============================================
Route::get('/admin/home', 'Admin\Index@home')->name('admin.home');
