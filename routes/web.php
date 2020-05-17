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

Route::prefix('admin')->group(function () {
    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login');
    //logout
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');

});


//============== FRONTEND =====================================

Route::get('/', 'Frontend\Index@home')->name('frontend_home');

//============== ADMIN ============================================
Route::prefix('admin')->group(function () {
    Route::get('/home', 'Admin\Index@home')->name('admin.home');
    Route::get('/brand', 'Admin\Brand@index')->name('admin.brand');
    Route::post('/brand', 'Admin\Brand@add_brand');
});
