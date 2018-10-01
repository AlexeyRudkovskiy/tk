<?php
/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 31.08.18
 * Time: 00:59
 */

namespace App\Entities;


use App\Event;
use App\Post;
use ARudkovskiy\Admin\Contracts\AbstractEntity;
use ARudkovskiy\Admin\EntityFields\DateField;
use ARudkovskiy\Admin\EntityFields\IdField;
use ARudkovskiy\Admin\EntityFields\SimpleRelationField;
use ARudkovskiy\Admin\EntityFields\TextField;

class EventEntity extends AbstractEntity
{

    protected $entityClass = Event::class;

    public function registerFields(): array
    {
        return [
            IdField::create('id')
                ->showInIndexTable()
                ->setOrderInIndexTable(1),
            TextField::create('title')
                ->showInIndexTable()
                ->setOrderInIndexTable(2),
            SimpleRelationField::create('post')
                ->setOptions([
                    'config' => [
                        'foreign_field' => 'title',
                        'model' => Post::class,
                        'entity' => 'post'
                    ],
                    'select2' => true
                ]),
            DateField::create('event_at')
        ];
    }

    public function getTranslations(): array
    {
        return trans('entities.event');
    }

    public function validateRequest(string $type): bool
    {
        return true;
    }

}