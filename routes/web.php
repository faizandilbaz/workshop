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
    Route::post('employee/creates', 'EmployeeController@getTeamsByCompany')->name('company.teams');
    ////////////////////////////////Profile///////////////////////////////
    Route::view('admin/profile', 'admin.profile.index')->name('profile.index');
    Route::resource('admin', 'AdminController');
  });

  });


  ///////////////////////////////////////////////////COMPANY//////////////////////////////////////////
  Route::group(['prefix' => 'company', 'namespace' => 'App\Http\Controllers\Company', 'as' => 'company.',], function () {
    Route::post('workshop/check','WorkShopController@checkworkshop')->name('workshop.check');
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
    Route::post('workshop/question/add','WorkShopController@addQuestion')->name('workshop.add_question');
   
    Route::resource('question', 'QuestionController');
    Route::resource('option', 'OptionController');
    
    Route::view('work/shop/edit', 'company.workShop.edit')->name('shop.physical.edit');
    ////////////////////////////////Profile///////////////////////////////
    Route::view('company/profile', 'company.profile.index')->name('profile.index');
    Route::put('company/update/{id}','CompanyController@update')->name('update');
    ////////////////////////////////PROJECT CONTROLLERS/////////////////////////////
    Route::view('project/accepted', 'company.project.accepted')->name('project.accepted');
    Route::view('project/decline', 'company.project.decline')->name('project.decline');
    Route::view('project/completed', 'company.project.completed')->name('project.completed');
    Route::put('project/points/{id}','ProjectController@points')->name('project.points');
    Route::resource('project', 'ProjectController');
    Route::resource('note', 'NoteController');
  });
  });


  /////////////////////////////////////////////////////TEAM////////////////////////////////
  Route::group(['prefix' => 'team', 'namespace' => 'App\Http\Controllers\Team', 'as' => 'team.',], function () {

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
    Route::put('team/update/{id}','TeamController@update')->name('update');
     ////////////////////////////////PROJECT CONTROLLERS/////////////////////////////
     Route::post('project/check', 'ProjectController@check')->name('project.check'); 
     Route::view('project/new', 'team.project.new')->name('project.new');
     Route::view('project/accepted', 'team.project.accept')->name('project.accept');
     Route::view('project/decline', 'team.project.decline')->name('project.declines');
     Route::view('project/complete', 'team.project.completed')->name('project.completed');
     Route::get('project/accepted/{id}', 'ProjectController@accepted')->name('project.accepted');
     Route::get('project/decline/{id}', 'ProjectController@decline')->name('project.decline');
     Route::get('project/complete/{id}', 'ProjectController@complete')->name('project.complete');
     Route::resource('project', 'ProjectController');
     Route::resource('note', 'NoteController');
    ////////////////////////////////TASK CONTROLLERS/////////////////////////////
    Route::put('task/points/{id}','TaskController@points')->name('task.points');
    Route::resource('task', 'TaskController');
    Route::resource('employeenote', 'EmployeenoteController');



  });
  });



  ///////////////////////////////////////////////////EMPLOYEE///////////////////////////////////////////
  Route::group(['prefix' => 'employee', 'namespace' => 'App\Http\Controllers\Employee', 'as' => 'employee.',], function () {
   
    Route::group(['middleware' => 'auth:user'], function () { 
    /*******************Logout ROUTES*************/       
    Route::get('logout', '\App\Http\Controllers\AuthController@logout')->name('logout');
    /*******************Register ROUTES*************/
    Route::view('register', 'employee.auth.register')->name('register');
    /*******************Dashboard ROUTES*************/
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    ////////////////////////////////EMPLOYEE WORKSHOP /////////////////////////////
    Route::view('show', 'employee.workShope.create')->name('workShope.create');
    Route::get('workshop/running', 'WorkShopController@today')->name('workshop.today');
    Route::get('workshop/previous', 'WorkShopController@previous')->name('workshop.previous');
    Route::get('workshop/attend/{id}', 'WorkShopController@attend')->name('workshop.attend');
    Route::get('workshop/attended/{id}', 'WorkShopController@attended')->name('workshop.attended');
    Route::get('workshop/test/{id}', 'WorkShopController@test')->name('workshop.test');
    Route::post('result/store', 'WorkShopController@resultstore')->name('result.store');
    Route::resource('workshop', 'WorkShopController');
    /*******************RANK ROUTES*************/
    Route::get('rank', 'RankController@index')->name('rank.index');
    Route::get('rank/{id}', 'RankController@show')->name('rank.show');
    /*******************CHALLENGE ROUTES*************/
    Route::resource('challenge', 'ChallengeController');
    Route::get('challenge/stores/{id}', 'ChallengeController@stores')->name('challenge.stores');
    ////////////////////////////////Profile///////////////////////////////
    Route::view('profile', 'employee.profile.index')->name('profile.index');
    Route::put('employee/update/{id}','EmployeeController@update')->name('update');
    ////////////////////////////////TASK CONTROLLERS/////////////////////////////
    Route::view('task/running', 'employee.task.running')->name('task.running');
    Route::view('task/completed', 'employee.task.completed')->name('task.completed');
    Route::get('task/running/{id}', 'TaskController@accepted')->name('task.accepted');
    Route::get('task/complete/{id}', 'TaskController@complete')->name('task.complete');
    Route::resource('task', 'TaskController');
    Route::resource('employeenote', 'EmployeenoteController');
  });
  });

