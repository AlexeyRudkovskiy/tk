<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostMeta extends Model
{

    protected $fillable = [
        'key', 'value'
    ];

    public function getValueAttribute() {
        $value = $this->attributes['value'];
        $unserialized = @unserialize($value);
        if ($unserialized === false) {
            return $value;
        }

        return $unserialized;
    }

    public function setValueAttribute($value) {
        if (is_object($value) || is_array($value)) {
            $this->attributes['value'] = serialize($value);
        } else {
            $this->attributes['value'] = $value;
        }
    }

}
