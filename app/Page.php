<?php

namespace App;

use App\Http\Controllers\PageController;
use App\Traits\FullTextSearch;
use ARudkovskiy\Admin\Models\Category;
use ARudkovskiy\Admin\Models\User;
use ARudkovskiy\Admin\Traits\Menuable;
use ARudkovskiy\Admin\Traits\Routable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Page extends Model
{

    use Menuable;
    use FullTextSearch;
    use Routable;

    protected $searchable = [
        'title', 'content'
    ];

    public static function boot()
    {
        parent::boot();

        static::deleting(function(Page $page) {
            $page->route()->delete();
        });
    }

    public function author()
    {
        return $this->belongsTo(User::class);
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
        return url($this->slug);
    }

    public function getController(): string
    {
        return PageController::class;
    }

    public function getAction(): string
    {
        return 'show';
    }

    public function getRoutedUrl(): string
    {
        return '/' . $this->slug;
    }

    public function scopeTitle(Builder $builder, string $title) {
        return $builder->where('title', $title);
    }

}
