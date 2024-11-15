<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Extends Layout Name
    |--------------------------------------------------------------------------
    |
    | Your main layout file path name. Example: layouts.app
    |
    */

    'layout_name' => 'layouts.app',

    /*
    |--------------------------------------------------------------------------
    | Section Name
    |--------------------------------------------------------------------------
    |
    | Your section name which in yield in main layout file. Example: content
    |
    */

    'section_name' => 'content',

    /*
    |--------------------------------------------------------------------------
    | Route Name, Prefix & Middleware
    |--------------------------------------------------------------------------
    |
    | Provide a route name for activity-log route. Example: user.activity-logs
    | Provide a prefix name for activity-log url. Example: user/activity-logs
    | If activity-log route use any middleware then provide it or leave empty array. Example: ['auth']
    */

    'route_name' => 'user.activity-logs',
    'route_prefix' => 'user/activity-logs',
    'middleware' => [],

    /*
    |--------------------------------------------------------------------------
    | Bootstrap version
    |--------------------------------------------------------------------------
    |
    | Which bootstrap you use in your application. Example: 3 or 4 or 5
    |
    */

    'bootstrap_v' => 5,

    /*
    |--------------------------------------------------------------------------
    | CSS
    |--------------------------------------------------------------------------
    |
    | Add your css class in this property if you want to change design.
    */

    'css' => [
        'container' => null,
        'card' => null,
        'input' => null,
        'btn' => null,
        'table' => null,
        'table_action_col_width' => null,
        'table_action_btn' => null,
    ],
];
