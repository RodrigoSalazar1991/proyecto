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
Route::post('/admin/system/db-backup', [
        'as'   => 'system.dbBackup',
        'uses' => 'SystemController@postDbBackUp'
    ]);


Route::group(['prefix' => 'admin'], function() {
		
   
    Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
    Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show','middleware' => ['permission:role-list']]);
	Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-update']]);
	Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-update']]);
	Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);

	Route::resource('roles', 'RoleController',
      ['only' => ['index', 'store'],'middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);


    Route::resource('users','UserController');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('agenda', 'AgendaController');
