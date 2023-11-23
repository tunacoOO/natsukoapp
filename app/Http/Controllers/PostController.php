<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\TimeCategory;
use App\Models\Like;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function dashboard(Category $category,TimeCategory $time_category)
    {
        $categories = Category::get();
        $time_categories = TimeCategory::get();
        $prefs = config('pref');
        $posts = Post::get();
        return view('posts.dashboard',[
            'categories' => $categories,
            'time_categories' => $time_categories,
            'prefs' => $prefs,
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
        
        if($request->input('pref_id')){
            $post = $post->where('pref_id',$request->input('pref_id'));
        }

        // 投稿内容の部分一致で絞り込み
        if($request->input('body')){
            $post = $post->where('body', 'like', '%'.$request->input('body').'%');
        }
        
        if($request->input('title')){
            $post = $post->where('title', 'like', '%'.$request->input('title').'%');
        }

        $posts = $post->get();

        return view('posts.all',[
            'posts' => $post ->get()
        ]);
    }
    
    
    public function create(Category $category,TimeCategory $time_category)
    {
        
        
        $categories = Category::get();
        $time_categories = TimeCategory::get();
        $prefs = config('pref');
        $posts = Post::get();
        return view('posts.create',[
            'categories' => $categories,
            'time_categories' => $time_categories,
            'prefs' => $prefs,
            ]);
                
    }
    
    
   
    
    public function store(PostRequest $request,Post $post)
    {
        $userId = Auth::id();
        
        $post = new Post();
        $input = $request['post'];
        $images = $request->file('images');
        $post->pref_id  = $request->input('pref_id');
        $post->user_id = Auth::id();
        $post->fill($input)->save();
        $file = $request->file('post.images');
        $file_path = $file->store('public');
        Session::put('img_path', str_replace('public', 'storage', $file_path));
        return redirect('/posts/'.$post->id);
    }
    
    public function edit(Post $post,Category $category,TimeCategory $time_category)
    {
        $prefs = config('pref');
        
        return view('posts.edit')->with([
            'post' => $post,
            'categories' => $category->get(),
            'time_categories' => $time_category->get(),
            'prefs' => $prefs,
            ]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $images = $request->file('images');
        $post->fill($input_post)->save();
         $post->pref_id  = $request->input('pref_id');
        $file = $request->file('post.images');
        $file_path = $file->store('public');
        Session::put('img_path', str_replace('public', 'storage', $file_path));
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
        {
            $post->delete();
            return redirect('/posts/' . $post->id);
        }
        
    public function like(Post $post)
    {
        $post->likes()->create(['user_id' => auth()->id()]);
        return back();
    }
    
    public function unlike(Post $post)
    {
        $post->likes()->where('user_id',auth()->id())->delete();
        return back();
    }

}
