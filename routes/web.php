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
Route::get('category/{id}', 'Frontend\CategoryController@index');
Route::get('subcategory/{id}', 'Frontend\CategoryController@subcategory_product');
Route::get('product/{id}', 'Frontend\CategoryController@view_product');
Route::get('today', 'Frontend\CategoryController@today')->name('today');
Route::get('/add/wishlist/{id}', 'Frontend\WishController@add_wish');

Route::get('/addcart/{id}', 'Frontend\CartController@add_cart');
Route::post('/addcart/', 'Frontend\CartController@add_cart_p')->name('add_cart');
Route::get('/cart/', 'Frontend\CartController@cart')->name('cart')->middleware('auth');
Route::get('remove/cart/{id}', 'Frontend\CartController@remove_cart')->name('remove_cart')->middleware('auth');

Route::get('/wishlist/', 'Frontend\WishController@wishlist')->name('wishlist')->middleware('auth');
Route::get('remove/wishlist/{id}', 'Frontend\WishController@remove_wishlist')->name('remove_wishlist')->middleware('auth');













//============== ADMIN ============================================
Route::prefix('admin')->group(function () {
    Route::get('/home', 'Admin\Index@home')->name('admin.home');

    //Brand
    Route::get('/brand', 'Admin\Brand@index')->name('admin.brand');
    Route::post('/brand', 'Admin\Brand@add_brand');
    Route::get('brand/soft_delete/{id}','Admin\Brand@soft_delete')->name('brand.soft_delete');
    Route::get('brand/delete/brand','Admin\Brand@deleted_brand')->name('deleted.brand');
    Route::get('brand/delete_brand/{id}','Admin\Brand@brand_delete')->name('brand.delete');
    Route::get('brand/restore/brand/{id}','Admin\Brand@restore_brand')->name('brand.restore');
    Route::get('brand/update/brand/{id}','Admin\Brand@edit_brand')->name('brand.update');
    Route::post('brand/update/brand/{id}','Admin\Brand@update_brand');
    //Banner
    Route::get('/banner', 'Admin\Banner@index')->name('admin.banner');
    Route::post('/banner', 'Admin\Banner@add_banner');
    Route::get('banner/soft_delete/{id}','Admin\Banner@banner_soft_delete')->name('banner.soft_delete'); //soft delte
    Route::get('banner/delete/{id}','Admin\Banner@banner_delete')->name('banner.delete');//hard delete
    Route::get('banner/deleted_banner','Admin\Banner@deleted_banner')->name('deleted.banner'); //show deleted banner
    Route::get('banner/restore/banner/{id}','Admin\Banner@restore_banner')->name('banner.restore'); //banner restore
    Route::get('banner/update/banner/{id}','Admin\Banner@edit_banner')->name('banner.update');
    Route::post('banner/update/banner/{id}','Admin\Banner@update_banner');

    // Head Category
    Route::get('/head/category', 'Category\HeadCategory@home')->name('admin.head_category');
    Route::post('/head/category', 'Category\HeadCategory@add_head_category');
    Route::get('/delete/head/category/{id}', 'Category\HeadCategory@delete_head_category')->name('delete_head_category');
    // Sub category
    Route::get('/sub/category', 'Category\SubCategory@home')->name('admin.sub_category');
    Route::post('/sub/category', 'Category\SubCategory@add_sub_category');
    Route::get('/delete/sub/category/{id}', 'Category\SubCategory@delete_sub_category')->name('delete_sub_category');
    // category
    Route::get('/category', 'Category\Category@home')->name('admin.category');
    Route::post('/category', 'Category\Category@add_cateogry');
    Route::get('/get_sub_category/{id}', 'Category\Category@sub_category');
    Route::get('/delete/category/{id}', 'Category\Category@delete_category')->name('delete_category');

    //Cupon
    Route::get('/cupon','Admin\CuponController@index')->name('admin.cupon');
    Route::post('/cupon','Admin\CuponController@add_cupon');
    Route::get('/cupon/{id}','Admin\CuponController@delete_cupon')->name('delete_cupon');

    // Product

    Route::get('all/product','Admin\ProductController@product_show')->name('admin.product_show');
    Route::get('/product','Admin\ProductController@index')->name('admin.product');
    Route::post('/product','Admin\ProductController@add_product');
    Route::get('/get_category/{id}','Admin\ProductController@category');

    Route::get('/view_product/{id}','Admin\ProductController@view_product')->name('view_product');
    Route::get('/edit_product/{id}','Admin\ProductController@edit_product')->name('edit_product');
    Route::post('/edit_product/{id}','Admin\ProductController@edit_product');

    Route::get('/product_soft_delete/{id}','Admin\ProductController@product_soft_delete')->name('product_soft_delete');
    Route::get('/show_deleted_product/','Admin\ProductController@show_deleted_product')->name('show_deleted_product');
    Route::get('/restore_deleted_product/{id}','Admin\ProductController@restore_deleted_product')->name('restore_deleted_product');
    Route::get('/delete_deleted_product/{id}','Admin\ProductController@delete_deleted_product')->name('delete_deleted_product');
});

