<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Post;
class FrontController extends Controller
{
    public function news($slug)
    {
        $news = Post::whereSlug($slug)->first();
        $title = $news->title;
        return view('Front.news.news',compact('news','title'));
    }
}
