<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\TimeCategory;

class TimeCategoryController extends Controller
{
     public function time(TimeCategory $time_category)
    {
        $posts_rel = $time_category->posts()->get();
        $post = new Post;

        return view('categories.time_categories')->with([
            'time_category' => $time_category,
            'posts' => $posts_rel,
        ]);}
}
