<?php

//Route::get('/', function () {
//    return view('welcome');
//});
Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(function () {
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
        Route::get('profiles/{id}/permissions', 'PermissionProfileController@permissions')
            ->name('profiles.permissions');

        Route::get('permissions/{id}/profile', 'PermissionProfileController@profiles')
            ->name('permissions.profiles');

        Route::get('profiles/{id}/permissions/create', 'PermissionProfileController@available')
            ->name('profiles.permissions.available');

        Route::post('profiles/{id}/permissions', 'PermissionProfileController@attach')
            ->name('profiles.permissions.attach');

        Route::get('profiles/{id}/permissions/{permissionId}', 'PermissionProfileController@detach')
            ->name('profiles.permissions.detach');

        // plan's profile route
        Route::get('plans/{id}/profiles', 'PlanProfileController@profiles')
            ->name('plans.profiles');

        Route::get('profiles/{id}/plans', 'PlanProfileController@plans')
            ->name('profiles.plans');

        Route::get('plans/{id}/profiles/create', 'PlanProfileController@available')
            ->name('plans.profiles.available');

        Route::post('plans/{id}/profiles', 'PlanProfileController@attach')
            ->name('plans.profiles.attach');

        Route::get('plans/{id}/profiles/{profileId}', 'PlanProfileController@detach')
            ->name('plans.profiles.detach');

    });
});

// auth route
Auth::routes(['register' => false]);

// site route
Route::get('/site','Site\SiteController@index')
    ->name('site.home');
