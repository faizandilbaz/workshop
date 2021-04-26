<?php

use App\Http\Controllers\Company\WorkShopController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|---------------------------
-----------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('auth.login');
});
// Route::group(['middleware' => 'auth:admin'], function () {

//     Route::view('dashboard', 'dashboard.index')->name('dashboard');
// });

////////////////////////////////////////////////ADMIN///////////////////////////////////////////

Route::post('login','\App\Http\Controllers\AuthController@login')->name('login-post');

  Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Admin'], function () {


    // Route::view('login', 'admin.auth.login')->name('login');
    Route::group(['middleware' => 'auth:admin'], function () { 
    /*******************Logout ROUTES*************/       
    // Route::get('logout','AuthController@logout')->name('logout');
    Route::get('logout', '\App\Http\Controllers\AuthController@logout')->name('logout');

    /*******************Dashoard ROUTES*************/
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    ////////////////////////////////company/////////////////////////////
    Route::resource('company', 'CompanyController');
    ////////////////////////////////TEAMs/////////////////////////////
    Route::resource('team', 'TeamController');
    ////////////////////////////////EMPLOYEE/////////////////////////////
    Route::resource('employee', 'EmployeeController');
    Route::post('company/teams', 'EmployeeController@getTeamsByCompany')->name('company.teams');
    ////////////////////////////////Profile///////////////////////////////
    Route::view('admin/profile', 'admin.profile.index')->name('profile.index');
    Route::resource('admin', 'AdminController');
  });

  });


  ///////////////////////////////////////////////////COMPANY//////////////////////////////////////////
  Route::group(['prefix' => 'company', 'namespace' => 'App\Http\Controllers\Company', 'as' => 'company.',], function () {

    Route::group(['middleware' => 'auth:company'], function () { 
    /*******************Logout ROUTES*************/       
    Route::get('logout', '\App\Http\Controllers\AuthController@logout')->name('logout');
    /*******************Dashboard ROUTES*************/
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    ////////////////////////////////TEAMs/////////////////////////////
    Route::resource('team', 'TeamController');
    ////////////////////////////////EMPLOYEE/////////////////////////////
    Route::resource('employee', 'EmployeeController');

    ///////////////////////////////Work Shope/////////////////////////////
    Route::resource('workshop', 'WorkShopController');
    
    Route::view('work/shop', 'company.workShop.create')->name('shop.create');
    Route::view('work/show/shop', 'company.workShop.index')->name('shop.index');
    Route::view('work/shop/edit', 'company.workShop.edit')->name('shop.physical.edit');
    ////////////////////////////////Profile///////////////////////////////
    Route::view('company/profile', 'company.profile.index')->name('profile.index');
    Route::put('company/update/{id}','CompanyController@update')->name('update');
  });
  });


  /////////////////////////////////////////////////////TEAM////////////////////////////////
  Route::group(['prefix' => 'team', 'namespace' => 'App\Http\Controllers\Team', 'as' => 'team.',], function () {
    // Route::view('login', 'team.auth.login')->name('login');
    // Route::post('login','AuthController@login');
    Route::group(['middleware' => 'auth:team'], function () { 
    /*******************Logout ROUTES*************/       
    Route::get('logout', '\App\Http\Controllers\AuthController@logout')->name('logout');
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    /*******************Register ROUTES*************/
    Route::view('register', 'team.auth.register')->name('register');
    /*******************Dashboard ROUTES*************/

    // Route::view('dashboard', 'team.dashboard.index')->name('dashboard');
    ////////////////////////////////TEAMs/////////////////////////////
    Route::view('team/create', 'team.info.create')->name('info.create');
    Route::view('team/show', 'team.info.index')->name('info.index');
    Route::view('team/edit', 'team.info.edit')->name('info.edit');
    ////////////////////////////////EMPLOYEE/////////////////////////////
    Route::resource('employee', 'EmployeeController');
    ////////////////////////////////Profile///////////////////////////////
    Route::view('team/profile', 'team.profile.index')->name('profile.index');
  });
  });



  ///////////////////////////////////////////////////EMPLOYEE///////////////////////////////////////////
  Route::group(['prefix' => 'employee', 'namespace' => 'App\Http\Controllers\Employee', 'as' => 'employee.',], function () {
    Route::view('login', 'employee.auth.login')->name('login');
    Route::post('login','AuthController@login');
    Route::group(['middleware' => 'auth:user'], function () { 
    /*******************Logout ROUTES*************/       
    Route::get('logout', '\App\Http\Controllers\AuthController@logout')->name('logout');
    /*******************Register ROUTES*************/
    Route::view('register', 'employee.auth.register')->name('register');
    /*******************Dashboard ROUTES*************/
    Route::view('dashboard', 'employee.dashboard.index')->name('dashboard');
    ////////////////////////////////EMPLOYEE/////////////////////////////
    Route::view('show', 'employee.workShope.create')->name('workShope.create');
    Route::get('workshop/today', 'WorkShopController@today')->name('workshop.today');
    Route::get('workshop/attend/{id}', 'WorkShopController@attend')->name('workshop.attend');
    Route::get('workshop/test/{id}', 'WorkShopController@test')->name('workshop.test');
    Route::resource('workshop', 'WorkShopController');
    //  Route::view('employee/edit', 'employee.info.edit')->name('info.edit');
    ////////////////////////////////Profile///////////////////////////////
    Route::view('profile', 'employee.profile.index')->name('profile.index');
    ////////////////////////////////Rank///////////////////////////////
    Route::view('rank', 'employee.rank.index')->name('rank.index');
  });
  });

