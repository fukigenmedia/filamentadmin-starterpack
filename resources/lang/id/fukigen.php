<?php

return [
    'navigation' => [
        'Akun',
        'Sistem',
        'Pengaturan',
    ],

    'profile' => [
        'resource' => [
            'label' => 'Profil',
            'labels' => 'Profil',
            'title' => 'Profil',
            'slug' => 'akun/profil',
            'nav' => [
                'group' => 'Akun',
                'label' => 'Profil',
            ]
        ],
        'field' => [
            'name' => 'Nama',
            'email' => 'Surel',
            'current-password' => 'Kata Sandi Sekarang',
            'new-password' => 'Kata Sandi Baru',
            'confirm-password' => 'Konfirmasi Kata Sandi',
        ],
        'button' => [
            'save' => 'Simpan',
            'cancel' => 'Batal',
        ],
        'notification' => [
            'success' => 'Profil Anda telah diperbarui.'
        ],
    ],

    'roles' => [
        'resource' => [
            'label' => 'Peran',
            'labels' => 'Data Peran',
            'title' => 'Peran',
            'slug' => 'akun/peran',
            'nav' => [
                'group' => 'Akun',
                'label' => 'Peran',
            ]
        ],
        'field' => [],
        'button' => [],
        'notification' => [],
    ],
];
