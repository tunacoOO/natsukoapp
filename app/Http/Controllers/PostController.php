<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\TimeCategory;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Session;


class PostController extends Controller
{
    public function dashboard(Category $category,TimeCategory $time_category)
    {
        $categories = Category::get();
        $time_categories = TimeCategory::get();
        $posts = Post::get();
        return view('posts.dashboard',[
            'categories' => $categories,
            'time_categories' => $time_categories,
            'posts' => $posts
            ]);
    
    }
    
    public function all(Request $request,Post $post){
        $post = new Post;

        // カテゴリーで絞り込み
        if($request->input('category_id')){
            $post = $post->where('category_id', $request->input('category_id'));
        }
        
        if($request->input('time_category_id')){
            $post = $post->where('time_category_id',$request->input('time_category_id'));
        }

        // 投稿内容の部分一致で絞り込み
        if($request->input('body')){
            $post = $post->where('body', 'like', '%'.$request->input('body').'%');
        }

        $posts = $post->get();

        return view('posts.all',[
            'posts' => $post ->get()
        ]);
    }
    
    public function search(PostRequest $request,Category $category)
    {

        return view('post.show')->with(['categories' => $category->get()]);
        $category_id = $request->input('category');
        
        if($category_id == ""){
            $posts = Post::all();
        }else{
            $post = Post::where('category_id',$category_id)->get();
        }
       

    }
    
    
    public function create(Category $category,TimeCategory $time_category)
    {
        
          
        
        $categories = Category::get();
        $time_categories = TimeCategory::get();
        $pref = config('pref');
        $posts = Post::get();
        return view('posts.create',[
            'categories' => $categories,
            'time_categories' => $time_categories,
            'pref' => $pref,
            'posts' => $posts
            ]);
                
    }
    
    
   
    
    public function store(PostRequest $request,Post $post)
    {
        $input = $request['post'];
        $images = $request->file('images');
        $post->fill($input)->save();
        $post->pref_id = $request->pref;
        $file = $request->file('post.images');
        $file_path = $file->store('public');
        Session::put('img_path', str_replace('public', 'storage', $file_path));
        return redirect('/posts/'.$post->id);
    }
    
    public function edit(Post $post,Category $category,TimeCategory $time_category)
    {
        return view('posts.edit')->with([
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
