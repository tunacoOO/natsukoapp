<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\TimeCategory;
use App\Models\Like;
use App\Models\Image;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;



class PostController extends Controller
{
    public function dashboard(Category $category,TimeCategory $time_category,Request $request)
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
    
    public function all(Request $request,Post $post,Image $image){
        $post = new Post;
        $posts = Post::with('images')->get();
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
        $images = $image->get();

        return view('posts.all',[
            'posts' => $post->get(),
            'images' => $image->get()
        ]);
    }
    
    
    public function create(Category $category,TimeCategory $time_category,Request $request)
    {
        
        
        $categories = Category::get();
        $time_categories = TimeCategory::get();
        $prefs = config('pref');
        $posts = Post::get();
        $images = Image::get();
        
        return view('posts.create',[
            'categories' => $categories,
            'time_categories' => $time_categories,
            'prefs' => $prefs,
            ]);
                
    }
    
    
    
    public function store(PostRequest $request,Post $post,Image $image)
    {
        $userId = Auth::id();
        
        $post = new Post();
        $input = $request['post'];
        $post->pref_id  = $request->input('pref_id');
        $post->user_id = Auth::id();
        
        
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/images');
                $image = new Image();
                $image->path = str_replace('public', 'storage', $path);
                $image->post_id = $post->id; 
                $image->save();
            }
        }
        
        
        return redirect('/posts/'.$post->id);
        
    }
    
    public function edit(Post $post,Category $category,TimeCategory $time_category,Image $image)
    {
        $prefs = config('pref');
        
        return view('posts.edit')->with([
            'post' => $post,
            'categories' => $category->get(),
            'time_categories' => $time_category->get(),
            'prefs' => $prefs,
            'images' => $image->get()
            ]);
    }
    
    public function update(PostRequest $request, Post $post,Image $image)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        
        
        foreach($images as $image){
        $input_image = $request['images'];
        }
        $image->fill($input_image)->save();
        
        
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post,Image $image)
        {
            if($image->path){
                Storage::disk('public')->delete('images/'.$image->path);
            }
            
            $post->delete();
            return redirect('/posts/');
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
