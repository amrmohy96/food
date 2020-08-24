<?php


use App\Http\Controllers\Admin\PlanController;
use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('vendor.adminlte.master');
});

Route::resource('admin/plans','Admin\PlanController');
