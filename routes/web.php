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

Auth::routes();
Route::get('/', 'Controller@dashboardAction')->name("dashboard");

Route::get('/systems/list', 'ManagementController@systemsListAction')->name('management.systems.list');
Route::get('/systems/manage/{system}', 'ManagementController@manageSystemAction')->name('management.systems.manage');
Route::get('/systems/manage/delete/{system}', 'ManagementController@manageDeleteSystemAction')->name('management.systems.delete');
Route::get('/systems/add', 'ManagementController@addSystemAction')->name("management.systems.add");
Route::post('/systems/add', 'ManagementController@addSystemPost');

Route::get('/maps/manage/{system}/{map}', 'ManagementController@manageMapAction')->name('management.maps.manage');
Route::get('/maps/add/{system}', 'ManagementController@addSystemMapAction')->name('management.maps.add');