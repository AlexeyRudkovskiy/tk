<?php
/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 25.07.18
 * Time: 01:34
 */

namespace App\LinkProcessors;


use ARudkovskiy\Admin\Contracts\LinkProcessorContract;

class PostTitleLinkProcessor implements LinkProcessorContract
{

    public function generateLink($payload): array
    {
        return [
            'url' => route('admin.crud.edit', [ 'id' => $payload->id ]),
            'label' => 'foo'
        ];
    }

}