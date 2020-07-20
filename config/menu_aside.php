<?php
// Aside menu
return [

    'items' => [
        // Dashboard
        [
            'title' => 'Dashboard',
            'root' => true,
            'icon' => 'media/svg/icons/Shopping/Barcode-read.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => 'admin',
            'new-tab' => false,
        ],
        [
            'title' => 'Organizations',
            'root' => true,
            'icon' => 'media/svg/icons/Shopping/Barcode-read.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => 'admin/organizations',
            'new-tab' => false,
        ],
        [
            'title' => 'Agents',
            'root' => true,
            'icon' => 'media/svg/icons/Shopping/Barcode-read.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => 'admin/agents',
            'new-tab' => false,
        ],
        [
            'title' => 'Influencers',
            'root' => true,
            'icon' => 'media/svg/icons/Shopping/Barcode-read.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => 'admin/influencers',
            'new-tab' => false,
        ],
    ]

];
