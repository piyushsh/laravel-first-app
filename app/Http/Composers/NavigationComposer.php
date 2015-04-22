<?php namespace App\Http\Composers;
use App\Article;
use Illuminate\Contracts\View\View;

/**
 * Created by PhpStorm.
 * User: piyush sharma
 * Date: 21-04-2015
 * Time: 14:38
 */

class NavigationComposer {

    public function compose(View $view)
    {
        $view->with('latest', Article::latest()->first());
    }
}