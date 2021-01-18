<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'TaskController@index');

Route::post('/creat-new-task', 'TaskController@creat');

Route::get('/validate-{id}', ['as'=>'id', 'uses' =>'TaskController@done']);

Route::post('/edit-{id}',['as'=>'id', 'uses' =>'TaskController@edit'] );

Route::post('/delete','TaskController@delete' );

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout','HomeController@logout');