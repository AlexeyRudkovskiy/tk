<?php
/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 26.08.18
 * Time: 18:53
 */

namespace App\Http\ViewComposers;


use App\Post;
use ARudkovskiy\Admin\Container\AdminContainerInterface;
use ARudkovskiy\Admin\Models\Menu;
use Illuminate\View\View;

class FrontendViewComposer
{

    public function compose(View $view)
    {
        $headerMenu = Menu::whereTag('header')->first();
        if ($headerMenu === null) {
            $headerMenu = new Menu();
        }

        $viewData = $view->getData();
        $menus = [ 'left-sidebar' => collect([]), 'right-sidebar' => collect([]) ];

        if (array_key_exists('_menus', $viewData)) {
            $viewData['_menus']
                ->each(function (Menu $menu) use ($menus) {
                    if (!array_key_exists($menu->location, $menus)) {
                        return;
                    }

                    $menus[$menu->location]->push($menu);
                });
        }

        view()->share('current_page', \Route::getCurrentRoute()->getName());
        view()->share('menus', $menus);
        view()->share('header_menu', $headerMenu);
        view()->share('promoted_posts', Post::promoted()->latest()->get());
    }

}