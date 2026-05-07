<?php

return [
    'home' => [
        'name' => 'TRANG CHỦ',
        'icon' => 'fas fa-home',
        'role' => false,
        'child' => false,
    ],
    'introduce' => [
        'name' => 'GIỚI THIỆU',
        'icon' => 'fas fa-globe-asia',
        'role' => false,
        'child' => false,
    ],
    'privileges' => [
        'name' => 'ĐẶC QUYỀN HỘI VIÊN',
        'icon' => 'far fa-newspaper',
        'role' => false,
        'child' => false,
    ],
    'datafinancial' => [
        'name' => 'DỮ LIỆU FINTOP',
        'icon' => 'far fa-newspaper',
        'role' => false,
        'child' => [
            'index' => [
                'name' => 'Tra cứu cổ phiếu',
                'icon' => 'fas fa-search',
                'role' => false,
            ],
            'signalIndex' => [
                'name' => 'TOP cổ phiếu',
                'icon' => 'fas fa-signal',
                'role' => false,
            ],
            'recommendationsIndex' => [
                'name' => 'Tín Hiệu V.I.P',
                'icon' => 'fas fa-comments-dollar',
                'role' => false,
            ],
            'categoryFintopIndex' => [
                'name' => 'Danh mục V.I.P',
                'icon' => 'fas fa-sitemap',
                'role' => false,
            ]
        ],
    ],
    'about' => [
        'name' => 'BÁO CÁO PHÂN TÍCH',
        'icon' => 'fas fa-hand-holding-usd',
        'role' => false,
        'child' => [
            'index' => [
                'name' => 'Thị trường tổng hợp',
                'icon' => 'fas fa-search-dollar',
                'role' => false,
            ],
            'session' => [
                'name' => 'V.I.P Đầu Tư',
                'icon' => 'fas fa-calendar-alt',
                'role' => false,
            ],
            'industry' => [
                'name' => 'BCPT Ngành',
                'icon' => 'fas fa-industry',
                'role' => false,
            ],
            'stock' => [
                'name' => 'BCPT Doanh nghiệp',
                'icon' => 'fas fa-chart-line',
                'role' => false,
            ],
        ],
    ],
    'library' => [
        'name' => 'CẨM NANG ĐẦU TƯ',
        'icon' => 'fas fa-book-medical',
        'role' => false,
        'child' => false,
    ],
    'des' => [
        'name' => 'HƯỚNG DẪN ĐẦU TƯ A-Z',
        'icon' => 'far fa-question-circle',
        'role' => false,
        'child' => false,
    ],

];