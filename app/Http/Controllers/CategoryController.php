<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\TimeCategory;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $posts_rel = $category->posts()->get();
        $post = new Post;

        return view('categories.categories')->with([
            'category' => $category,
            'posts' => $posts_rel,
        ]);
    }
    
   
}
