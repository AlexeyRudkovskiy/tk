<?php

namespace App\Http\Controllers;

use App\Post;
use ARudkovskiy\Admin\Models\Category;
use Illuminate\Http\Request;

class DefaultController extends Controller
{

    public function index()
    {
        $posts = Post::latest()->paginate(config('frontend.pagination.on_page'));

        return view('welcome')
            ->with('posts', $posts)
            ->with('category', new Category());
    }
    
}
