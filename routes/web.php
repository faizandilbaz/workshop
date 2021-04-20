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
// Route::group(['middleware' => 'auth:admin'], function () {
    
//     Route::view('dashboard', 'dashboard.index')->name('dashboard');
// });

////////////////////////////////////////////////ADMIN///////////////////////////////////////////


Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.',], function () {
 Route::view('login', 'admin.auth.login')->name('login');

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
 ////////////////////////////////Profile///////////////////////////////
Route::view('admin/profile', 'admin.profile.index')->name('profile.index');
});


///////////////////////////////////////////////////COMPANY//////////////////////////////////////////
Route::group(['prefix' => 'company', 'namespace' => 'Company', 'as' => 'company.',], function () {
Route::view('login', 'company.auth.login')->name('login');
Route::view('register', 'company.auth.register')->name('register');

Route::view('dashboard', 'company.dashboard.index')->name('dashboard');
// Route::view('company/create', 'company.info.create')->name('info.create');
// Route::view('company/show', 'company.info.index')->name('info.index');
// Route::view('company/edit', 'company.info.edit')->name('info.edit');
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
Route::view('work/show/shop', 'company.workShop.physical.index')->name('shop.index');
Route::view('work/shop/edit', 'company.workShop.physical.edit')->name('shop.physical.edit');
////////////////////////////////Profile///////////////////////////////
Route::view('company/profile', 'company.profile.index')->name('profile.index');

});


/////////////////////////////////////////////////////TEAM////////////////////////////////
Route::group(['prefix' => 'team', 'namespace' => 'Team', 'as' => 'team.',], function () {
Route::view('login', 'team.auth.login')->name('login');
Route::view('register', 'team.auth.register')->name('register');

 Route::view('dashboard', 'team.dashboard.index')->name('dashboard');
 ////////////////////////////////TEAMs/////////////////////////////
 Route::view('team/create', 'team.info.create')->name('info.create');
 Route::view('team/show', 'team.info.index')->name('info.index');
 Route::view('team/edit', 'team.info.edit')->name('info.edit');
////////////////////////////////EMPLOYEE/////////////////////////////
  Route::view('employee/create', 'team.employee.create')->name('employee');
  Route::view('employee/show', 'team.employee.index')->name('employee.index');
  Route::view('employee/edit', 'team.employee.edit')->name('employee.edit');
////////////////////////////////Profile///////////////////////////////
Route::view('team/profile', 'team.profile.index')->name('profile.index');
});



///////////////////////////////////////////////////EMPLOYEE///////////////////////////////////////////
Route::group(['prefix' => 'employee', 'namespace' => 'Employee', 'as' => 'employee.',], function () {
 Route::view('login', 'employee.auth.login')->name('login');
 Route::view('register', 'employee.auth.register')->name('register');

 Route::view('dashboard', 'employee.dashboard.index')->name('dashboard');
 ////////////////////////////////EMPLOYEE/////////////////////////////
 Route::view('show', 'employee.workShope.create')->name('workShope.create');
//  Route::view('employee/show', 'employee.info.index')->name('info.index');
//  Route::view('employee/edit', 'employee.info.edit')->name('info.edit');
////////////////////////////////Profile///////////////////////////////
Route::view('profile', 'employee.profile.index')->name('profile.index');
////////////////////////////////Rank///////////////////////////////
Route::view('rank', 'employee.rank.index')->name('rank.index');
});
