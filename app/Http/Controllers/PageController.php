<?php

namespace App\Http\Controllers;

use App\Page;
use ARudkovskiy\Admin\Models\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{

    /**
     * @param Page $page
     * @return $this
     */
    public function show($page) {
        $menus = $page->categories
            ->map(function (Category $category) {
                return $category->menus;
            })
            ->flatten();

        return view('page.show')
            ->with('page', $page)
            ->with('_menus', $menus);
    }

}
