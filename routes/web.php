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



Route::redirect('/', '/menu-manager');

Auth::routes();


Route::get('/home', 'MenuItemController@index')->name('home');
Route::view('/posts', 'post.index')->name('post.index');
Route::view('/categories', 'category.index')->name('category.index');

Route::middleware('auth')->group(function(){
    Route::post('/helper', 'HelperController@changestatus')->name('changestatus'); 
    Route::get('/menu-manager', 'MenuItemController@index')->name('menu');
    Route::get('/menu/create', 'MenuItemController@create')->name('menu.create');
    Route::get('/menu/{item}', 'MenuItemController@show')->name('show');
    Route::post('/menu', 'MenuItemController@store')->name('menu.store');
    Route::get('/menu/{item}/edit', 'MenuItemController@edit')->name('menu.edit'); 
    Route::put('/menu/{item}', 'MenuItemController@update')->name('menu.update'); 
    Route::delete('/menu/{item}', 'MenuItemController@destroy')->name('menu.destroy');
    Route::delete('/submenu/{item}', 'MenuSubitemController@destroy')->name('submenu.destroy');
});

