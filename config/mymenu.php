<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Admin Navigation Menu
    |--------------------------------------------------------------------------
    |
    | This array is for Navigation menus of the backend.  Just add/edit or
    | remove the elements from this array which will automatically change the
    | navigation.
    |
    */

    // SIDEBAR LAYOUT - MENU

    'sidebar' => [
        [
            'title' => 'Product',
            'link' => '#',
            'active' => 'superadmin/Product*',
            'icon' => 'icon-fa icon-fa-dashboard',
            'children' => [
                [
                    'title' => 'Product',
                    'link' => '/superadmin/product',
                    'active' => 'superadmin/product',
                ],
                [
                    'title' => 'Company',
                    'link' => '/superadmin/company',
                    'active' => 'superadmin/company',
                ],
                
            ]
        ],
        [
            'title' => 'Category',
            'link' => '#',
            'active' => 'superadmin/Category*',
            'icon' => 'icon-fa icon-fa-th-large',
            'children' => [
                [
                    'title' => 'Category',
                    'link' => '/superadmin/category',
                    'active' => 'admin/layouts/sidebar',
                ],
                
            ]
        ],
        // [
        //     'title' => 'Layouts',
        //     'link' => '#',
        //     'active' => 'admin/layouts*',
        //     'icon' => 'icon-fa icon-fa-th-large',
        //     'children' => [
        //         [
        //             'title' => 'Sidebar',
        //             'link' => '/admin/layouts/sidebar',
        //             'active' => 'admin/layouts/sidebar',
        //         ],
        //         [
        //             'title' => 'Icon Sidebar',
        //             'link' => '/admin/layouts/icon-sidebar',
        //             'active' => 'admin/layouts/icon-sidebar',
        //         ],
        //         [
        //             'title' => 'Horizontal Menu',
        //             'link' => '/admin/layouts/horizontal-menu',
        //             'active' => 'admin/layouts/horizontal-menu',
        //         ]
        //     ]
        // ],
        
    ]
];
