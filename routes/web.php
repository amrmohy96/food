<?php
use App\Http\Controllers\Admin\PlanController;
//Route::get('/', function () {
//    return view('welcome');
//});
Route::prefix('admin')->namespace('Admin')->group(function (){
    Route::get('/','DashboardController@index')->name('admin');
    Route::resource('plans','PlanController');
});
