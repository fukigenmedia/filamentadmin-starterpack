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
];
