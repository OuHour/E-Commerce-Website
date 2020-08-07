<?php

use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('layouts.app');
// });

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/laptops', 'HomeController@laptop')->name('home.laptop');

// Route::get('/dashboard', function () {
//     return view('admin.master_dashboard');
// });

Auth::routes();

Route::prefix('admin')->name('admin.')->middleware('can:edit-users')->group(function () {

    // User Role Route
    Route::get('/users', 'Admin\UserController@index')->name('users.index');
    Route::post('/users/ /{id}', 'Admin\UserController@update')->name('users.update');
    Route::get('/users/delete/{id}', 'Admin\UserController@destroy')->name('users.destroy');

    // Dashboard Route
    Route::get(
        '/dashboard',
        'ProductController@dashboard'
    )->name('sidebar');

    // Product Route
    Route::get('/dashboard/products', 'ProductController@index')->name('product.index');
    // Route::get('dashboard/create/products', 'ProductController@create')->name('admin.product.create');
    Route::post('dashboard/store/products', 'ProductController@store')->name('product.store');
    Route::get('dashboard/products/delete/{id}', 'ProductController@delete');
    Route::get('dashboard/edit/product/{id}', 'ProductController@edit');
    Route::get('dashboard/show/product/{id}', 'ProductController@show');
    Route::post('dashboard/update/product/{id}', 'ProductController@update')->name('product.update');

    // Category Route

    Route::get('/dashboard/categories', 'CategoryController@index')->name('categories.index');
    // Route::get('/create', 'CategoryController@create')->name('admin.categories.create');
    Route::post('dashboard/store/categories', 'CategoryController@store')->name('categories.store');
    Route::get('dashboard/category/delete/{id}', 'CategoryController@delete');
    Route::get('dashboard/edit/category/{id}', 'CategoryController@edit');
    Route::get('dashboard/show/category/{id}', 'CategoryController@show');
    Route::post('dashboard/update/category/{id}', 'CategoryController@update');
});

// Route::get('/home', function () {
//     return view('client.index');
// });

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/dashboard', 'HomeController@index')->name('layouts.master_dashboard');