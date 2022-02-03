<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Table Columns
    |--------------------------------------------------------------------------
    */

    'column.name' => 'Nama',
    'column.guard_name' => 'Guard',
    'column.roles' => 'Peran',
    'column.permissions' => 'Akses',
    'column.updated_at' => 'Disunting',

    /*
    |--------------------------------------------------------------------------
    | Form Fields
    |--------------------------------------------------------------------------
    */

    'field.name' => 'Nama',
    'field.guard_name' => 'Guard',
    'field.permissions' => 'Akses',
    'field.select_all.name' => 'Pilih Semua',
    'field.select_all.message' => 'Aktifkan semua Izin untuk peran ini',

    /*
    |--------------------------------------------------------------------------
    | Navigation & Resource
    |--------------------------------------------------------------------------
    */

    'nav.group' => 'Akun',
    'nav.role.label' => 'Peran',
    'nav.role.icon' => 'heroicon-o-shield-check',
    'resource.label.role' => 'Peran',
    'resource.label.roles' => 'Data Peran',

    /*
    |--------------------------------------------------------------------------
    | Section & Tabs
    |--------------------------------------------------------------------------
    */
    'section' => 'Entitas',
    'resources' => 'CRUD',
    'widgets' => 'Widget',
    'pages' => 'Halaman',
    'custom' => 'Izin Kustom',

    /**
     * HasPageShield Trait Forbidden Message
     */
    'forbidden' => 'Anda tidak memiliki izin untuk mengakses',
];
