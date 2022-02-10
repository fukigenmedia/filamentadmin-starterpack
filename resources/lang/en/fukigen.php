<?php

return [
    'navigation' => [
        'Account',
        'System',
        'Settings',
    ],

    'profile' => [
        'resource' => [
            'label' => 'Profile',
            'labels' => 'Profile',
            'title' => 'Profile',
            'slug' => 'account/profile',
            'nav' => [
                'group' => 'Account',
                'label' => 'Profile',
            ]
        ],
        'field' => [
            'name' => 'Name',
            'email' => 'Email',
            'current-password' => 'Current Password',
            'new-password' => 'New Password',
            'confirm-password' => 'Confirm Password',
        ],
        'button' => [
            'save' => 'Save',
            'cancel' => 'Cancel',
        ],
        'notification' => [
            'success' => 'Your profile has been updated.'
        ],
    ],

    'roles' => [
        'resource' => [
            'label' => 'Role',
            'labels' => 'Roles',
            'title' => 'Roles',
            'slug' => 'account/roles',
            'nav' => [
                'group' => 'Account',
                'label' => 'Roles',
            ]
        ],
        'field' => [],
        'button' => [],
        'notification' => [],
    ],

    'users' => [
        'resource' => [
            'label' => 'User',
            'labels' => 'Users',
            'title' => 'Users',
            'slug' => 'account/users',
            'nav' => [
                'group' => 'Account',
                'label' => 'Users',
            ]
        ],
        'field' => [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'confirm-password' => 'Confirm Password',
            'roles' => 'Roles',
            'created-at' => 'Created At',
            'updated-at' => 'Updated At',
        ],
        'button' => [],
        'notification' => [
            'password-helper' => 'leave it blank if you don\'t want to change.'
        ],
    ],

    'log-activities' => [
        'resource' => [
            'label' => 'Log Activity',
            'labels' => 'Log Activities',
            'title' => 'Log Activity',
            'slug' => 'system/log-activity',
            'nav' => [
                'group' => 'System',
                'label' => 'Log Activities',
            ]
        ],
        'field' => [
            'username' => 'Username',
            'action' => 'Action',
            'information' => 'Information',
            'time' => 'Time',
        ],
        'filter' => [
            'action' => 'Action',
            'date-start' => 'Date From',
            'date-end' => 'Date Until',
        ],
        'button' => [],
        'notification' => [],
    ],

    'setting' => [
        'manage-site' => [
            'resource' => [
                'label' => 'Manage Site',
                'labels' => 'Manage Site',
                'title' => 'Manage Site',
                'slug' => 'setting/site',
                'nav' => [
                    'group' => 'Setting',
                    'label' => 'Site',
                ]
            ],
            'field' => [
                'general' => 'General',
                'name' => 'Application Name',
                'slogan' => 'Slogan',
                'image' => 'Images',
                'logo' => 'Application Logo',
                'icon' => 'Application Icon',
            ],
            'filter' => [],
            'button' => [
                'save' => 'Save',
                'cancel' => 'Cancel',
            ],
            'notification' => [],
        ],
    ],
];
