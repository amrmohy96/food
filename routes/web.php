<?php

//Route::get('/', function () {
//    return view('welcome');
//});
Route::prefix('admin')->namespace('Admin')->group(function () {
    // admin route
    Route::get('/', 'DashboardController@index')->name('admin');
    // plans route
    Route::resource('plans', 'PlanController');
    // plan details route
    Route::resource('plans/{url}/details', 'DetailPlanController');
    // ACL namespace
    Route::namespace('ACl')->group(function () {
        // profiles route
        Route::resource('profiles', 'ProfileController');
        // permissions route
        Route::resource('permissions', 'PermissionController');
        // profile's permission route
        Route::get('profiles/{id}/permissions','PermissionProfileController@permissions')->name('profiles.permissions');
        Route::get('profiles/{id}/permissions/create','PermissionProfileController@available')->name('profiles.permissions.available');
        Route::post('profiles/{id}/permissions','PermissionProfileController@attach')->name('profiles.permissions.attach');
        Route::get('profiles/{id}/permissions/{permissionId}','PermissionProfileController@detach')->name('profiles.permissions.detach');
    });
});
