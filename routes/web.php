<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//  Master Routes
Route::get('/master', 'MasterController@index')->name('masters');
Route::get('/master/users', 'MasterController@indexUsers')->name('master.users');
Route::get('/master/roles', 'MasterController@indexRoles')->name('master.roles');
Route::get('/master/permissions', 'MasterController@indexPermissions')->name('master.permissions');
Route::get('/master/modules', 'MasterController@indexModules')->name('master.modules');
Route::get('/master/applications', 'MasterController@indexApplications')->name('master.applications');




//  Module Routes
Route::get('/modules/getmodules', 'ModuleController@getModules');
Route::post('/modules/savemodule', 'ModuleController@saveModule');


//  Applications Routes
Route::get('/applications/getapps', 'ApplicationsController@getApps');
Route::post('/applications/saveapp', 'ApplicationsController@saveApp');
