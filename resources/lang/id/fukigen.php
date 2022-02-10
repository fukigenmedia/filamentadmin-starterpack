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

    'users' => [
        'resource' => [
            'label' => 'Pengguna',
            'labels' => 'Data Pengguna',
            'title' => 'Pengguna',
            'slug' => 'akun/pengguna',
            'nav' => [
                'group' => 'Akun',
                'label' => 'Pengguna',
            ]
        ],
        'field' => [
            'name' => 'Nama',
            'email' => 'Surel',
            'password' => 'Kata Sandi',
            'confirm-password' => 'Konfirmasi Kata Sandi',
            'roles' => 'Peran',
            'created-at' => 'Dibuat',
            'updated-at' => 'Disunting',
        ],
        'button' => [],
        'notification' => [
            'password-helper' => 'kosongkan jika tidak ingin mengubah.'
        ],
    ],

    'log-activities' => [
        'resource' => [
            'label' => 'Log Aktifitas',
            'labels' => 'Data Log Aktifitas',
            'title' => 'Log Aktifitas',
            'slug' => 'sistem/log-aktifitas',
            'nav' => [
                'group' => 'Sistem',
                'label' => 'Log Aktifitas',
            ]
        ],
        'field' => [
            'username' => 'Nama Pengguna',
            'action' => 'Aksi',
            'information' => 'Informasi',
            'time' => 'Waktu',
        ],
        'filter' => [
            'action' => 'Aksi',
            'date-start' => 'Tanggal Awal',
            'date-end' => 'Tanggal Akhir',
        ],
        'button' => [],
        'notification' => [],
    ],

    'setting' => [
        'manage-site' => [
            'resource' => [
                'label' => 'Pengaturan Situs',
                'labels' => 'Pengaturan Situs',
                'title' => 'Pengaturan Situs',
                'slug' => 'pengaturan/situs',
                'nav' => [
                    'group' => 'Pengaturan',
                    'label' => 'Situs',
                ]
            ],
            'field' => [
                'general' => 'Umum',
                'name' => 'Nama Aplikasi',
                'slogan' => 'Slogan',
                'image' => 'Gambar',
                'logo' => 'Logo Aplikasi',
                'icon' => 'Ikon Aplikasi',
            ],
            'filter' => [],
            'button' => [
                'save' => 'Simpan',
                'cancel' => 'Batal',
            ],
            'notification' => [],
        ],
    ],
];
