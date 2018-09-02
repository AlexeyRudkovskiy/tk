<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    public function scopeActual(Builder $table)
    {
        return $table->where('is_actual', true);
    }

    public function post() {
        return $this->belongsTo(Post::class);
    }

}
