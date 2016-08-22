<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default source repository type
    |--------------------------------------------------------------------------
    |
    | The default source repository type you want to pull your updates from.
    |
    */

    'default' => env('SELF_UPDATER_SOURCE', 'github'),

    /*
    |--------------------------------------------------------------------------
    | Version installed
    |--------------------------------------------------------------------------
    |
    | Set this to the version of your software installed on your system.
    |
    */

    'version_installed' => env('SELF_UPDATER_VERSION_INSTALLED', ''),

    /*
    |--------------------------------------------------------------------------
    | Repository types
    |--------------------------------------------------------------------------
    |
    | A repository can be of different types, which can be specified here.
    | Current options:
    | - github
    |
    */

    'repository_types' => [
        'github' => [
            'type' => 'github',
            'repository_vendor' => env('SELF_UPDATER_REPO_VENDOR', ''),
            'repository_name' => env('SELF_UPDATER_REPO_NAME', ''),
            'repository_url' => '',
            'download_path' => env('SELF_UPDATER_DOWNLOAD_PATH', '/tmp'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Event Logging
    |--------------------------------------------------------------------------
    |
    | Configure if fired events should be logged
    |
    */

    'log_events' => env('SELF_UPDATER_LOG_EVENTS', false),

    /*
    |--------------------------------------------------------------------------
    | Mail To Settings
    |--------------------------------------------------------------------------
    |
    | Configure if fired events should be logged
    |
    */

    'mail_to' => [
        'address' => env('SELF_UPDATER_MAILTO_ADDRESS', ''),
        'name' => env('SELF_UPDATER_MAILTO_NAME', ''),
        'subject_update_available' => env('SELF_UPDATER_MAILTO_UPDATE_AVAILABLE_SUBJECT', 'Update available'),
        'subject_update_succeeded' => env('SELF_UPDATER_MAILTO_UPDATE_SUCCEEDED_SUBJECT', 'Update succeeded'),
    ],

];
