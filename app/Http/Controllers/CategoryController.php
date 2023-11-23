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
    
    public function edit(Post $post,Category $category,TimeCategory $time_category)
    {
        
         $pref = config('pref');
        return view('posts.edit')->with([
            'pref' => $pref,
            'post' => $post,
            'categories' => $category->get(),
            'time_categories' => $time_category->get(),
            ]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $images = $request->file('images');
        $post->fill($input)->save();
        $post->prefecture = $request->input('prefecture');
        $file = $request->file('post.images');
        $file_path = $file->store('public');
        Session::put('img_path', str_replace('public', 'storage', $file_path));
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
        {
            $post->delete();
            return redirect('/');
        }
}
