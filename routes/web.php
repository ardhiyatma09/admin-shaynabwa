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
Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('products','ProductController');
    Route::get('products/{id}/gallery','ProductController@gallery')->name('products.gallery');
    Route::resource('photo','ProductGalleryController'); 
    Route::resource('transaction','TransactionController'); 
    Route::get('transaction/{id}/status','TransactionController@setStatus')->name('transaction.status');   
});


Auth::routes(['register' => false]);
