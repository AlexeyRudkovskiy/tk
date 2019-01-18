<?php
/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 20.07.18
 * Time: 22:19
 */

namespace App\Entities;

use App\EntityFields\AuthorField;
use App\Post;
use ARudkovskiy\Admin\Contracts\AbstractEntity;
use ARudkovskiy\Admin\EntityFields\BooleanField;
use ARudkovskiy\Admin\EntityFields\CategoriesField;
use ARudkovskiy\Admin\EntityFields\FileField;
use ARudkovskiy\Admin\EntityFields\IdField;
use ARudkovskiy\Admin\EntityFields\MetaBoolField;
use ARudkovskiy\Admin\EntityFields\SimpleRelationField;
use ARudkovskiy\Admin\EntityFields\SlugField;
use ARudkovskiy\Admin\EntityFields\StaticField;
use ARudkovskiy\Admin\EntityFields\TextField;
use ARudkovskiy\Admin\EntityFields\WYSIWYGField;
use ARudkovskiy\Admin\Models\User;

class PostEntity extends AbstractEntity
{

    protected $entityClass = Post::class;

    /** @var Post */
    protected $record = null;

    protected $menuable = true;

    public function registerFields(): array
    {
        return [
            IdField::create('id')->showInIndexTable()->setOrderInIndexTable(-1),
            TextField::create('title')->setOptions([
                'location' => 'sidebar',
                'attributes' => [
                    'placeholder' => 'Title'
                ]
            ])
                ->showInIndexTable()
                ->setOrderInIndexTable(1),
            SlugField::create('slug')->setOptions([
                'location' => 'sidebar',
                'attributes' => [
                    'placeholder' => 'Slug',
                    'disabled' => 'disabled'
                ],
                'config' => [
                    'field' => 'title'
                ]
            ]),
            WYSIWYGField::create('content')
                ->setOptions([
                    'save_without_slashes' => 'content_text'
                ]),
            AuthorField::create('author'),
            CategoriesField::create('categories')
                ->setOptions([
                    'location' => 'sidebar'
                ]),
            FileField::create('preview')
                ->setOptions([
                    'location' => 'sidebar'
                ]),
            MetaBoolField::create('hide_preview_on_page')
                ->setOptions([
                    'location' => 'sidebar'
                ]),
            StaticField::create('views', null, function ($value, $record) {
                return $record->getUniqueViews();
            })
                ->setOptions([
                    'location' => 'sidebar'
                ])
                ->showInIndexTable()
                ->setOrderInIndexTable(10)
                ->setWidth(100)
                ->setShouldIgnoreOnUpdate(true),
            StaticField::create('permalink')
                ->setOptions([
                    'location' => 'sidebar'
                ])
                ->setView(function ($value, $record) {
                    if ($record === null || $record->id === null) {
                        return;
                    }
                    $link = url()->to('/post/' . $record->slug);
                    return '<a href="' . $link . '" target="_blank">' . $link . '</a>';
                })
                ->setShouldIgnoreOnUpdate(true)
        ];
    }

    public function getAdditionalTableColumns(): array
    {
        return [  ];
    }

    public function getTranslations(): array
    {
        return trans('entities.post');
    }

    public function validateRequest(string $type): bool
    {
        switch ($type) {
            default:
                return true;
        }
    }

}