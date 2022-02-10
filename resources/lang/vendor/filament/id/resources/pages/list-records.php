<?php

return [

    'breadcrumb' => 'Daftar',

    'actions' => [

        'create' => [

            'label' => 'Tambah :label',

            'modal' => [

                'heading' => 'Tambah :label',

                'actions' => [

                    'create' => [
                        'label' => 'Tambah',
                    ],

                    'create_and_create_another' => [
                        'label' => 'Tambah & tambah lainnya',
                    ],

                ],

            ],

        ],

    ],

    'table' => [

        'actions' => [

            'delete' => [
                'label' => 'Hapus',
            ],

            'edit' => [

                'label' => 'Sunting',

                'modal' => [

                    'heading' => 'Sunting :label',

                    'actions' => [

                        'save' => [
                            'label' => 'Simpan',
                        ],

                    ],

                ],

            ],

            'view' => [
                'label' => 'Lihat',
            ],

        ],

        'bulk_actions' => [

            'delete' => [
                'label' => 'Hapus yang terpilih',
            ],

        ],

    ],

];
