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
            ],
            [
                'size' => [ 186, null ],
                'resize' => true,
                'name' => 'employer-photo'
            ],
            [
                'size' => [ 125, null ],
                'resize' => true,
                'name' => 'employer-photo-small'
            ]
        ]
    ],
    'pagination' => [
        'per_page' => 15
    ],
    'configs' => [
        [
            'name' => 'director',
            'type' => 'entity',
            'entity' => 'worker',
            'label' => 'Директор',
            'order' => [
                'by' => 'order',
                'type' => 'asc'
            ],
            'fields' => [ 'text' => 'full_name', 'value' => 'id' ]
        ],
        [
            'name' => 'director_slogan',
            'type' => 'text',
            'label' => 'Слоган'
        ],
        [
            'name' => 'address',
            'type' => 'text',
            'label' => 'Адреса'
        ],
        [
            'name' => 'phone_number',
            'type' => 'text',
            'label' => 'Номер телефону'
        ],
        [
            'name' => 'second_phone_number',
            'type' => 'text',
            'label' => 'Додатковий номер телефону'
        ],
        [
            'name' => 'second_email',
            'type' => 'text',
            'label' => 'E-Mail адреса'
        ],
        [
            'name' => 'email',
            'type' => 'text',
            'label' => 'Додаткова e-mail адреса'
        ]
    ]

];
