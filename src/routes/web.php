<?php

Route::group(['namespace' => 'Sudip\ActivityLog\Http\Controllers'], function () {
    $middlewareArr = is_array(config('activity-log.middleware')) ? config('activity-log.middleware') : [];
    $middlewares = array_merge(['web'], $middlewareArr);

    Route::group(['middleware' => $middlewares], function () {
        Route::get(config('activity-log.route_prefix'), 'ActivityLogController@index')->name(config('activity-log.route_name').'.index');
        Route::get(config('activity-log.route_prefix') . '/{id}', 'ActivityLogController@show')->name(config('activity-log.route_name').'.show');
    });
});
