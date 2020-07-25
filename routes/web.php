
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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/','frontend\Homecontroller@home')->name('home');

Route::get('/products','frontend\Homecontroller@product')->name('products');
//register route

Route::get('/register','frontend\AuthController@showRegistrationFrom')->name('register');
Route::post('/register','frontend\AuthController@showprocessRegistration');
Route::get('/profile','frontend\AuthController@profile')->name('profile');

//login route
Route::get('/login','frontend\AuthController@login')->name('login');
Route::post('/login','frontend\AuthController@process_login');

//admin route
Route::get('/admin','backend\AdminController@dashboard')->name('admin');

//Categories route
Route::get('/admin/categories','backend\AdminCategoriesController@index')->name('admin.categories');
Route::get('/admin/categories/create','backend\AdminCategoriesController@create')->name('admin.categories.create');

Route::post('/admin/category/create','backend\AdminCategoriesController@store')->name('admin.categories.store');
Route::get('/admin/category/edit/{id}','backend\AdminCategoriesController@categories_edit')->name('admin.categories.edit');
Route::post('/admin/category/update/{id}','backend\AdminCategoriesController@category_update')->name('admin.category.update');
Route::post('/admin/category/delete/{id}','backend\AdminCategoriesController@category_delete')->name('admin.category.delete');



















