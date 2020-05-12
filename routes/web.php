<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->namespace('Admin')->group(function() {
    /**
     * Details Plan Route
     */
    Route::resource('plans.details', 'DetailPlanController')->shallow();

    /**
     * Plan Routes
     */
    Route::any('plans/search', 'PlanController@search')->name('plans.search');
    Route::resource('plans', 'PlanController');

    

    Route::get('/', 'PlanController@index')->name('admin.index');
});



Route::get('/', function () {
    return view('welcome');
});
