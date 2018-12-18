<?php

namespace App;

use App\Traits\FullTextSearch;
use ARudkovskiy\Admin\Models\Category;
use ARudkovskiy\Admin\Models\File;
use ARudkovskiy\Admin\Models\User;
use ARudkovskiy\Admin\Traits\Menuable;
use CyrildeWit\EloquentViewable\Viewable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use Menuable;
    use Viewable;
    use FullTextSearch;

    protected $casts = [
        'content_schema' => 'json',
        'is_promoting' => 'boolean',
        'is_old_post' => 'boolean'
    ];

    protected $searchable = [
        'title', 'content'
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

    public function getShortText()
    {
        $exploded = explode('<p>[read-more]</p>', $this->content);
        return array_shift($exploded);
    }

    public function getFullText() {
        if ($this->is_old_post) {
            $readMoreToken = '<p>[read-more]</p>';
            $preview_part = strpos($this->content, $readMoreToken);
            if ($preview_part !== false) {
                return substr($this->content, $preview_part + strlen($readMoreToken));
            }
        }
        return str_replace('<p>[read-more]</p>', '', $this->content);
    }

    public function scopePromoted(Builder $query) {
        return $query->where('is_promoting', true);
    }

    public function metas()
    {
        return $this->hasMany(PostMeta::class);
    }

    /**
     * @param $key
     * @return PostMeta
     */
    public function meta($key)
    {
        $meta = $this->metas()->where('key', $key)->first();
        return $meta;
    }

    public function scopeSlug(Builder $builder, string $slug) {
        return $builder->where('slug', $slug);
    }

    public function scopeTitle(Builder $builder, string $title) {
        return $builder->where('title', $title);
    }

}
