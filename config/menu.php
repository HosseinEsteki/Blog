<?php
return[
    [
        'title'=>'داشبورد',
        'route'=>'home',
        'icon'=>'fa-regular fa-house',
    ],
    [
        'title'=>'پست ها',
        'route'=>'Articles',
        'icon'=>'fa-regular fa-file-lines',
        'items'=>[
            [
                'title'=>'تمامی پست ها',
                'route'=>'all-posts',
                'icon'=>'fa-regular fa-newspaper',
            ],[
                'title'=>'افزودن پست جدید',
                'route'=>'create-post',
                'icon'=>'fa-regular fa-pen',
            ],
        ]
    ],
    [
        'title'=>'دسته ها و برچسب ها',
        'route'=>'Categories',
        'icon'=>'fa-regular fa-tag',
        'items'=>[
            [
                'title'=>'تمامی دسته ها',
                'route'=>'all-categories',
                'icon'=>'fa-regular fa-filters',
            ],[
                'title'=>'افزودن دسته جدید',
                'route'=>'create-categorie',
                'icon'=>'fa-regular fa-square-plus',
            ],
            [
                'title'=>'تمامی برچسب ها',
                'route'=>'all-tags',
                'icon'=>'fa-regular fa-tags',
            ],[
                'title'=>'افزودن برچسب جدید',
                'route'=>'create-tag',
                'icon'=>'fa-regular fa-square-plus',
            ],
        ]
    ],
    [
        'title'=>'کاربران',
        'route'=>'user',
        'icon'=>'fa-regular fa-users',
        'items'=>[
            [
                'title'=>'فهرست',
                'route'=>'user.index',
                'icon'=>'fa-regular fa-users-viewfinder',
            ],[
                'title'=>'افزودن',
                'route'=>'user.create',
                'icon'=>'fa-regular fa-user-plus',
            ],
        ]
    ],
    [
        'title'=>'فعالیت ها',
        'route'=>'actions',
        'icon'=>'fa-regular fa-rotate-exclamation',
    ],
];
