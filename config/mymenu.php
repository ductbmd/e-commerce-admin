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
            'title' => 'Thống kê',
            'link' => '#',
            'active' => 'superadmin/ecommerce*',
            'icon' => 'icon-fa icon-fa-bar-chart',
            'children' => [
                [
                    'title' => 'Tổng quan',
                    'link' => '/superadmin/ecommerce',
                    'active' => 'superadmin/ecommerce',
                ],
                [
                    'title' => 'Doanh thu',
                    'link' => '/superadmin/orderStatistic',
                    'active' => 'superadmin/orderStatistic',
                ],
                
            ]
        ],
        [
            'title' => 'Đơn hàng',
            'link' => '#',
            'active' => 'superadmin/ecommerce*',
            'icon' => 'icon-fa icon-fa-shopping-cart',
            'children' => [
                [
                    'title' => 'Đơn hàng',
                    'link' => '/superadmin/order',
                    'active' => 'superadmin/order',
                ],
                
            ]
        ],
        [
            'title' => 'Sản phẩm',
            'link' => '#',
            'active' => 'superadmin/Product*',
            'icon' => 'icon-fa icon-fa-mobile-phone',
            'children' => [
                [
                    'title' => 'Điện thoại',
                    'link' => '/superadmin/product',
                    'active' => 'superadmin/product',
                ],
                [
                    'title' => 'Máy tính xách tay',
                    'link' => '/superadmin/laptop',
                    'active' => 'superadmin/laptop',
                ],
                [
                    'title' => 'Nhà sản xuất',
                    'link' => '/superadmin/company',
                    'active' => 'superadmin/company',
                ],
                
            ]
        ],
        [
            'title' => 'Khách hàng',
            'link' => '#',
            'active' => 'superadmin/Category*',
            'icon' => 'icon-fa icon-fa-user',
            'children' => [
                [
                    'title' => 'Khách hàng',
                    'link' => '/superadmin/user',
                    'active' => '/superadmin/user',
                ],
                
            ]
        ],
        [
            'title' => 'Category',
            'link' => '#',
            'active' => 'superadmin/Category*',
            'icon' => 'icon-fa icon-fa-bookmark',
            'children' => [
                [
                    'title' => 'Category',
                    'link' => '/superadmin/category',
                    'active' => 'admin/layouts/sidebar',
                ],
                
            ]
        ],
        [
            'title' => 'Khuyễn mãi',
            'link' => '#',
            'active' => 'superadmin/discount*',
            'icon' => 'icon-fa icon-fa-google-wallet',
            'children' => [
                [
                    'title' => 'Khuyễn mãi',
                    'link' => '/superadmin/discount',
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
