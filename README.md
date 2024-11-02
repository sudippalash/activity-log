## Activity Log

![alt text](https://github.com/sudippalash/activity-log/blob/main/img.jpg?raw=true)


[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]


`activity-log` is a activity log management package of `Laravel` that provides options to create & manage activity log.

Note: This package is wrapper of `spatie/laravel-activitylog` package.

## Install

Via Composer

```bash
composer require sudippalash/activity-log
```

### Publish config & migrations files


You should publish 

migrations files:
1. `database/migrations/create_activity_log_table.php`
2. `database/migrations/add_event_column_to_activity_log_table.php`, 
2. `database/migrations/add_batch_uuid_column_to_activity_log_table.php`, 

config files:
1. `config/activitylog.php`, 
2. `config/activity-log.php` 

with:

```bash
php artisan vendor:publish --provider="Sudip\ActivityLog\Providers\AppServiceProvider" --tag=required
```

For `config/activitylog.php` file you should check `spatie/laravel-activitylog` package documentation.

This is the contents of the published config file `config/activity-log.php`:

```php
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
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --provider="Sudip\ActivityLog\Providers\AppServiceProvider" --tag=views
```

Optionally, you can publish the lang using

```bash
php artisan vendor:publish --provider="Sudip\ActivityLog\Providers\AppServiceProvider" --tag=lang
```

You should run the migrations with:

```bash
php artisan migrate
```

## Usage

You should copy the below line and paste in your project menu section

```bash
<a href="{{ route(config('activity-log.route_name') . '.index') }}">{{ trans('activity-log::sp_activity_log.activity_logs') }}</a>
```

[ico-version]: https://img.shields.io/packagist/v/sudippalash/activity-log?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/sudippalash/activity-log?style=flat-square
[link-packagist]: https://packagist.org/packages/sudippalash/activity-log
[link-downloads]: https://packagist.org/packages/sudippalash/activity-log
[link-author]: https://github.com/sudippalash
