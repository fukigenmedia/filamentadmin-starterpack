<?php

/**
 * --------------
 * Fukigen Helper
 * --------------
 *
 * Collection of helper functions that we usually use
 * You can also add your helper function here
 *
 * by Fukigen Media
 * https://github.com/fukigenmedia
 */


use App\Models\System\LogActivity;
use App\Settings\SiteSettings;
use Illuminate\Support\Facades\Request;

/**
 * Exceeded connection timeout
 *
 * @return void
 */
if (!function_exists('fukigen_bypass_time_limit')) {
    function fukigen_bypass_time_limit()
    {
        ini_set('max_execution_time', '300');
        set_time_limit(300);
    }
}

/**
 * Save user activity to database
 *
 * @param string $action - action performed by the user.
 * @param string $subject - activities performed by the user.
 *
 * @return void
 */
if (!function_exists('fukigen_log')) {
    function fukigen_log($action, $subject)
    {
        LogActivity::create([
            'action' => $action,
            'subject' => $subject,

            'name' => auth()->user()->name ?? 'system',
            'email' => auth()->user()->email ?? 'system',

            'url' => Request::fullUrl(),
            'method' => Request::method(),
            'ip' => Request::ip(),
            'agent' => Request::header('user-agent'),
        ]);
    }
}

/**
 * Get manage site value easily
 * by filament/spatie-laravel-settings-plugin
 *
 * @param string $setting - setting key
 *
 * @return string result
 */
if (!function_exists('setting')) {
    function setting($setting)
    {
        return app(SiteSettings::class)->$setting;
    }
}
