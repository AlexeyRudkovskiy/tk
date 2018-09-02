<?php
/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 23.08.18
 * Time: 22:28
 */

namespace App\EntityFields;


use ARudkovskiy\Admin\EntityFields\SimpleRelationField;
use ARudkovskiy\Admin\Models\User;

class AuthorField extends SimpleRelationField
{

    public function __construct()
    {
        parent::__construct();

        $this->setOptions([
            'location' => 'sidebar',
            'config' => [
                'foreign_field' => 'full_name',
                'model' => User::class
            ]
        ]);
    }

    public static function create(string $name, string $label = null, $view = null)
    {
        $instance = parent::create($name, $label, $view);
        $instance->setView('admin.field.render.author');

        return $instance;
    }


}