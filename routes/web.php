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

    //Brand
    Route::get('/brand', 'Admin\Brand@index')->name('admin.brand');
    Route::post('/brand', 'Admin\Brand@add_brand');

    // Head Category
    Route::get('/head/category', 'Category\HeadCategory@home')->name('admin.head_category');
    Route::post('/head/category', 'Category\HeadCategory@add_head_category');
    // Sub category
    Route::get('/sub/category', 'Category\SubCategory@home')->name('admin.sub_category');
    Route::post('/sub/category', 'Category\SubCategory@add_sub_category');

});
