<?php
/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 28.08.18
 * Time: 22:07
 */

namespace App\Entities;


use App\EntityFields\AuthorField;
use App\Page;
use ARudkovskiy\Admin\Contracts\AbstractEntity;
use ARudkovskiy\Admin\EntityFields\CategoriesField;
use ARudkovskiy\Admin\EntityFields\IdField;
use ARudkovskiy\Admin\EntityFields\SlugField;
use ARudkovskiy\Admin\EntityFields\TextField;
use ARudkovskiy\Admin\EntityFields\WYSIWYGField;

class PageEntity extends AbstractEntity
{

    protected $entityClass = Page::class;

    protected $menuable = true;

    public function registerFields(): array
    {
        return [
            IdField::create('id')
                ->showInIndexTable()
                ->setOrderInIndexTable(1),
            TextField::create('title')
                ->setOptions([
                    'location' => 'sidebar'
                ])
                ->showInIndexTable()
                ->setOrderInIndexTable(2),
            SlugField::create('slug')
                ->setOptions([
                    'location' => 'sidebar',
                    'attributes' => [
                        'disabled' => true
                    ]
                ]),
            AuthorField::create('author')
                ->showInIndexTable()
                ->setOrderInIndexTable(3),
            WYSIWYGField::create('content'),
            CategoriesField::create('categories')
                ->setOptions([
                    'location' => 'sidebar'
                ])
        ];
    }

    public function getTranslations(): array
    {
        return trans('entities.page');
    }

    public function validateRequest(string $type): bool
    {
        return true;
    }

}