<?php

return [
    //role 1
    "ADMIN" => [
        'home' => [
            'name' => 'Trang Chủ',
            'icon' => 'fas fa-home',
            'a'    => 'nav-link link-home',
            'href' => '/system/home/index',
        ],
        'approvepayment' => [
            'name' => 'Phê duyệt thanh toán',
            'icon' => 'fas fa-money-check-alt',
            'a'    => 'nav-link link-approvepayment',
            'href' => '/system/approvepayment/index',
        ],
        // 'signal' => [
        //     'name' => 'Tín Hiệu V.I.P',
        //     'icon' => 'fas fa-signal',
        //     'a'    => 'nav-link link-signal',
        //     'href' => '/system/signal/index',
        // ],
        // 'recommended' => [
        //     'name' => 'Danh mục V.I.P',
        //     'icon' => 'fas fa-list-alt',
        //     'a'    => 'nav-link link-recommended',
        //     'href' => '/system/recommended/index',
        // ],
        'datafinancial' => [
            'name' => 'Dữ liệu chứng khoán',
            'icon' => 'fas fa-coins',
            'a'    => 'nav-link link-datafinancial',
            'href' => '/system/datafinancial/index',
        ],
        'blog' => [
            'name' => 'Quản trị bài viết',
            'icon' => 'far fa-calendar-alt',
            'a'    => 'nav-link link-blog',
            'href' => '/system/blog/index',
        ],
        'users' => [
            'name' => 'Quản trị nhân sự',
            'icon' => 'fas fa-users',
            'a'    => 'nav-link link-user',
            'href' => '/system/user/index',
        ],
        'client' => [
            'name' => 'Quản trị khách hàng',
            'icon' => 'fas fa-users',
            'a'    => 'nav-link link-client',
            'href' => '/system/client/index',
        ],
        'category' => [
            'name' => 'Quản trị danh mục',
            'icon' => 'far fa-calendar-alt',
            'a'    => 'nav-link link-category',
            'href' => '/system/category/index',
        ],
        'handbook' => [
            'name' => 'Cẩm nang nhà đầu tư',
            'icon' => 'fas fa-medkit',
            'a'    => 'nav-link link-handbook',
            'href' => '/system/handbook/index',
        ],
        // 'report' => [
        //     'name' => 'Báo cáo KPI',
        //     'icon' => 'fas fa-hand-holding-usd',
        //     'a'    => 'nav-link link-report',
        //     'href' => '/system/report/index',
        // ],
        // 'backupdata' => [
        //     'name' => 'Sao lưu dữ liệu',
        //     'icon' => 'fas fa-hdd',
        //     'a'    => 'nav-link link-backupdata',
        //     'href' => '/system/backupdata/index',
        // ],
        // 'userlog' => [
        //     'name' => 'Kiểm soát đăng nhập',
        //     'icon' => 'fas fa-user-secret',
        //     'a'    => 'nav-link link-userlog',
        //     'href' => '/system/userlog/index',
        // ],
        'sql' => [
            'name' => 'Quản trị DATA',
            'icon' => 'fas fa-hand-holding-usd',
            'a'    => 'nav-link link-sql',
            'href' => '/system/sql/index',
        ],
    ],
];
