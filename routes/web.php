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

Route::get('/', function () {
    return view('layout.admin');
});
Route::view('login', 'auth.login')->name('login');
// Route::group(['middleware' => 'auth:admin'], function () {
    
//     Route::view('dashboard', 'dashboard.index')->name('dashboard');
// });
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.',], function () {

 Route::view('dashboard', 'admin.dashboard.index')->name('dashboard');
 ////////////////////////////////company/////////////////////////////
Route::view('company/create', 'admin.company.create')->name('company');
Route::view('company/show', 'admin.company.index')->name('company.index');
Route::view('company/edit', 'admin.company.edit')->name('company.edit');
 ////////////////////////////////TEAMs/////////////////////////////
 Route::view('team/create', 'admin.team.create')->name('team');
 Route::view('team/show', 'admin.team.index')->name('team.index');
 Route::view('team/edit', 'admin.team.edit')->name('team.edit');
 ////////////////////////////////EMPLOYEE/////////////////////////////
 Route::view('employee/create', 'admin.employee.create')->name('employee');
 Route::view('employee/show', 'admin.employee.index')->name('employee.index');
 Route::view('employee/edit', 'admin.employee.edit')->name('employee.edit');
});

Route::group(['prefix' => 'company', 'namespace' => 'Company', 'as' => 'company.',], function () {
 Route::view('dashboard', 'company.dashboard.index')->name('dashboard');

Route::view('company/create', 'company.info.create')->name('info.create');
Route::view('company/show', 'company.info.index')->name('info.index');
Route::view('company/edit', 'company.info.edit')->name('info.edit');
 ////////////////////////////////TEAMs/////////////////////////////
 Route::view('team/create', 'company.team.create')->name('team');
 Route::view('team/show', 'company.team.index')->name('team.index');
 Route::view('team/edit', 'company.team.edit')->name('team.edit');
  ////////////////////////////////EMPLOYEE/////////////////////////////
  Route::view('employee/create', 'company.employee.create')->name('employee');
  Route::view('employee/show', 'company.employee.index')->name('employee.index');
  Route::view('employee/edit', 'company.employee.edit')->name('employee.edit');
  ///////////////////////////////Work Shope/////////////////////////////
  Route::view('work/shop', 'company.workShop.physical.create')->name('shop.create');
});

Route::group(['prefix' => 'team', 'namespace' => 'Team', 'as' => 'team.',], function () {
    Route::view('dashboard', 'team.dashboard.index')->name('dashboard');
     ////////////////////////////////TEAMs/////////////////////////////
 Route::view('team/create', 'team.info.create')->name('info.create');
 Route::view('team/show', 'team.info.index')->name('info.index');
 Route::view('team/edit', 'team.info.edit')->name('info.edit');
  ////////////////////////////////EMPLOYEE/////////////////////////////
  Route::view('employee/create', 'team.employee.create')->name('employee');
  Route::view('employee/show', 'team.employee.index')->name('employee.index');
  Route::view('employee/edit', 'team.employee.edit')->name('employee.edit');

});