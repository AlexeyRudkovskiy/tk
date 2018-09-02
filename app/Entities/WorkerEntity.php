<?php
/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 18.08.18
 * Time: 17:45
 */

namespace App\Entities;


use App\Worker;
use ARudkovskiy\Admin\Contracts\AbstractEntity;
use ARudkovskiy\Admin\EntityFields\DateField;
use ARudkovskiy\Admin\EntityFields\FileField;
use ARudkovskiy\Admin\EntityFields\IdField;
use ARudkovskiy\Admin\EntityFields\TextField;

class WorkerEntity extends AbstractEntity
{

    protected $entityClass = Worker::class;

    public function registerFields(): array
    {
        return [
            IdField::create('id'),
            TextField::create('full_name')
                ->showInIndexTable()
                ->setOrderInIndexTable(1),
            DateField::create('work_from')
                ->showInIndexTable()
                ->setOrderInIndexTable(2),
            FileField::create('photo')
        ];
    }

    public function getTranslations(): array
    {
        return trans('entities.worker');
    }

    public function validateRequest(string $type): bool
    {
        return true;
    }

}