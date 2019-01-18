<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'DefaultController@index')->name('homepage');
Route::get('/category/{category}', 'DefaultController@category')->name('category');
Route::get('/post/{post}', 'PostController@show')->name('post.show');

Route::get('/employees', 'EmployeesController@index')->name('employees.index');
Route::get('/employees/{employer}', 'EmployeesController@show')->name('employees.show');

Route::get('/search', 'SearchController@index')->name('search.index');

Route::get('/sitemap.xml', function () {
    $links = collect([]);
    $closure = function ($posts, $priority) use ($links) {
        /** @var \App\Post $post */
        foreach ($posts as $post) {
            $links->push([
                'url' => $post->getUrl(),
                'lastmod' => $post->updated_at->format('Y-m-d'),
                'changefreq' => 'monthly',
                'priority' => $priority
            ]);
        }
    };

    \App\Post::chunk(100, function ($posts) use ($closure) { return $closure($posts, 0.8); });
    \App\Page::chunk(100, function ($posts) use ($closure) { return $closure($posts, 0.7); });

    return response(view('sitemap', compact('links')))
        ->withHeaders([
            'Content-Type' => 'text/xml'
        ]);
});
