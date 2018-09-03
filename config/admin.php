<?php

return [

    'entities' => [
        \App\Entities\PostEntity::class,
        \App\Entities\WorkerEntity::class,
        \App\Entities\PageEntity::class,
        \App\Entities\EventEntity::class
    ],
    'storage' => storage_path(),
    'images' => [
        'thumbnails' => [
            [
                'size' => [ 150, 150 ],
                'crop' => [
                    'intelligent' => true
                ]
            ],
            [
                'size' => [ 676, null ],
                'resize' => true,
                'name' => 'default'
            ],
            [
                'size' => [ 164, 164 ],
                'crop' => [
                    'intelligent' => true
                ],
                'name' => 'gallery-item'
            ],
            [
                'size' => [ 1366, 493 ],
                'crop' => [
                    'intelligent' => true
                ],
                'name' => 'promo'
            ]
        ]
    ],
    'pagination' => [
        'per_page' => 15
    ]

];
