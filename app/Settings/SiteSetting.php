<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SiteSettings extends Settings
{
    public string $name;
    public string $slogan;
    public string $locale;
    public string|null $logo;
    public string|null $favico;

    public static function group(): string
    {
        return 'site';
    }
}
