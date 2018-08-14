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

Route::get('/', function () {
    return Redirect::to('login');
});

Auth::routes();

Route::group(['middleware' => ['auth' ]], function() {
    Route::get('/login/setrole', function(){
        return view('auth.chooserole');
    });

    Route::post('/setrole' , 'HomeController@setRole');

    //Project Routes
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/projects', 'ProjectController@index')->name('projectList');
    Route::get('/projects/show/{id}', 'ProjectController@show')->name('projectDetails');
    Route::get('/projects/edit/{id}', 'ProjectController@edit')->name('projectEdit');
    
    //Employees Route
    Route::get('/employees', 'EmployeeController@index')->name('employeeList');

    /*
    Route::get('/admin/vendor', 'VendorController@list')->name('adminListVendors');
    Route::post('/admin/vendor/approve', 'VendorController@approve')->name('approvevendor');
    Route::post('/admin/vendor/change_status', 'VendorController@changeStatus');

    Route::get('/admin/vendor/{id}', 'vendorController@displayVendor');
    Route::get('/admin/vendor/edit/{id}', 'vendorController@editVendor');
    Route::post('/admin/vendor/save', 'vendorController@saveVendor');
    */
});
