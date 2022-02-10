<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateSiteSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('site.name', env('APP_NAME', 'Laravel'));
        $this->migrator->add('site.slogan', 'Create New App Easily.');
        $this->migrator->add('site.locale', env('APP_LOCALE', 'en'));
        $this->migrator->add('site.logo', '');
        $this->migrator->add('site.favico', '');
    }
}
