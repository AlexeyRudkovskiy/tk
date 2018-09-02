<?php

return [
    'entities' => [
        'post' => [
            'sidebar' => 'Новости',
            'page' => [
                'header' => 'Новости'
            ],
            'titles' => [
                'index' => 'Новости',
                'edit' => 'Редактирование записи',
                'create' => 'Создание записи'
            ],
            'fields' => [
                'id' => 'ID',
                'title' => 'Заголовок',
                'content' => 'Содержимое',
                'slug' => 'Slug',
                'author' => 'Автор',
                'preview' => 'Предпросмотр',
                'views' => 'Просмотров',
                'permalink' => 'Прямая ссылка'
            ]
        ],
        'worker' => [
            'sidebar' => 'Работники',
            'page' => [
                'header' => 'Работники'
            ],
            'fields' => [
                'full_name' => 'Полное имя',
                'work_from' => 'Дата начала работы',
                'photo' => 'Фотография'
            ],
        ]
    ],
    'titles' => [
        'media' => [
            'index' => 'Медиа'
        ]
    ]
];