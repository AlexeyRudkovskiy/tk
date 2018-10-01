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

    public function getSmallDescriptionFormatted()
    {
        return $this->formatString($this->small_description);
    }

    public function getDescriptionFormatted()
    {
        return $this->formatString($this->description);
    }

    protected function formatString(string $text) {
        $text = explode(PHP_EOL, $text);
        $text = array_map(function ($line) {
            return "<p>{$line}</p>";
        }, $text);
        $text = implode(PHP_EOL, $text);

        return $text;
    }

}
