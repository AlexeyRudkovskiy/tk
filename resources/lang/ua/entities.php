<?php

return [
    'post' => [
        'sidebar' => 'Новини',
        'page' => [
            'header' => 'Новини'
        ],
        'menuable' => 'Новина',
        'title' => [
            'index' => 'Новини',
            'edit' => 'Редагування новини',
            'create' => 'Створення новини'
        ],
        'field' => [
            'id' => 'ID',
            'title' => 'Заголовок',
            'content' => 'Вміст',
            'slug' => 'Slug',
            'author' => 'Автор',
            'preview' => 'Предперегляд',
            'views' => 'Переглядів',
            'permalink' => 'Пряме посилання',
            'categories' => 'Категорії'
        ]
    ],
    'worker' => [
        'sidebar' => 'Робітники',
        'page' => [
            'header' => 'Робітники'
        ],
        'menuable' => 'Робітник',
        'field' => [
            'full_name' => 'Повне ім\'я',
            'work_from' => 'Дата почитку роботи',
            'photo' => 'Фотографія'
        ],
        'title' => [
            'index' => 'Список робітников',
            'create' => 'Додавання робітника',
            'edit' => 'Редагування робітника'
        ]
    ],
    'page' => [
        'sidebar' => 'Сторінки',
        'page' => [
            'header' => 'Сторінки'
        ],
        'menuable' => 'Сторінка',
        'field' => [
            'id' => 'ID',
            'title' => 'Заголовок',
            'content' => 'Вміст',
            'author' => 'Автор',
            'slug' => 'Slug',
            'categories' => 'Категорії'
        ],
        'title' => [
            'index' => 'Сторінки',
            'create' => 'Створення сторінки',
            'edit' => 'Редагування сторінки',
        ]
    ],
    'event' => [
        'sidebar' => 'Події',
        'page' => [
            'header' => 'Події'
        ],
        'menuable' => 'Подія',
        'field' => [
            'id' => 'ID',
            'title' => 'Назва події',
            'event_at' => 'Дата проведення',
            'post' => 'Новина'
        ],
        'title' => [
            'index' => 'Список подій',
            'create' => 'Додавання події',
            'edit' => 'Редагування події'
        ]
    ]
];