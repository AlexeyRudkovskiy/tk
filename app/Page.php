<?php

namespace App;

use App\Traits\FullTextSearch;
use ARudkovskiy\Admin\Models\Category;
use ARudkovskiy\Admin\Models\User;
use ARudkovskiy\Admin\Traits\Menuable;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    use Menuable;
    use FullTextSearch;

    protected $searchable = [
        'title', 'content'
    ];

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

}
