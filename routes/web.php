<?php

use Illuminate\Support\Facades\Route;

Route::any('admin/plans/search', 'Admin\PlanController@search')->name('plans.search');
Route::resource('admin/plans', 'Admin\PlanController');

Route::get('admin', 'Admin\PlanController@index')->name('admin.index');

Route::get('/', function () {
    return view('welcome');
});
