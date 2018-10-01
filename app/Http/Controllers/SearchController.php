<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function index(Request $request)
    {
        $query = $request->get('query');
        $posts = Post::whereRaw('match(title, content_text) against (? in natural language mode)', [ $query ])
            ->paginate(10);

        return view('post.search')
            ->with('posts', $posts)
            ->with('query', $query);
    }

}
