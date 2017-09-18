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

Route::get('/', 'Controller@dashboardAction')->name("dashboard");

Auth::routes();

Route::get('/systems/list', 'ManagementController@systemsListAction')->name('management.systems.list');
Route::get('/systems/manage/{system}', 'ManagementController@manageSystemAction')->name('management.systems.manage');
Route::get('/systems/manage/delete/{system}', 'ManagementController@manageDeleteSystemAction')->name('management.systems.delete');

Route::get('/maps/manage/{system}/{map}', 'ManagementController@manageMapAction')->name('management.maps.manage');