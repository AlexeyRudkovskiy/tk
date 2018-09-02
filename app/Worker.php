<?php

namespace App;

use ARudkovskiy\Admin\Models\File;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function photo()
    {
        return $this->belongsTo(File::class);
    }

}
