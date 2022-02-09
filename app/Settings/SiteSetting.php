<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SiteSettings extends Settings
{
    public string $name;
    public string $slogan;
    public string $locale;
    public string $logo;
    public string $favico;

    public static function group(): string
    {
        return 'site';
    }
}
