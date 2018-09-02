<?php

namespace App\Http\Controllers;

use App\Post;
use ARudkovskiy\Admin\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->addViewWithExpiryDate(Carbon::now()->addDays(1));

        $menus = $post->categories
            ->map(function (Category $category) {
                return $category->menus;
            })
            ->flatten();

        return view('post.show', [
            'post' => $post,
            '_menus' => $menus
        ]);
    }

}
