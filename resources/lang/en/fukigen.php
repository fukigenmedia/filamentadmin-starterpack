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
];
