<?php

namespace App;

use ARudkovskiy\Admin\Models\Category;
use ARudkovskiy\Admin\Models\File;
use ARudkovskiy\Admin\Models\User;
use ARudkovskiy\Admin\Traits\Menuable;
use CyrildeWit\EloquentViewable\Viewable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use Menuable;
    use Viewable;

    protected $casts = [
        'content_schema' => 'json'
    ];

    /**
     * Attached files
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function files() {
        return $this->belongsToMany(File::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function preview()
    {
        return $this->belongsTo(File::class);
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categoriable');
    }

    public function getText(): string
    {
        return $this->title;
    }

    public function getUrl(): string
    {
        return url('/post/' . $this->slug);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
