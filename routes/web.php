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

    /**
     * Profile Routes
     */
    Route::any('profiles/search', 'ProfileController@search')->name('profiles.search');
    Route::resource('profiles', 'ProfileController');

    /**
     * Permission Routes
     */
    Route::any('permissions/search', 'PermissionController@search')->name('permissions.search');
    Route::resource('permissions', 'PermissionController');

    Route::get('/', 'ProfileController@index')->name('admin.index');
});



Route::get('/', function () {
    return view('welcome');
});
