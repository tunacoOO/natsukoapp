<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>投稿編集</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600">
        <link rel="stylesheet" href="{{ asset('./css/edit.css') }}">
    </head>
    <body>
        <x-app-layout>
             <x-slot name="header">
        　編集画面
   　　　　 </x-slot
            <div class="content">
                <form action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="edit">
                        <div class='post_images'>
                             <input type="file" name="post[images]" value="{{ old('post.images') }}" accept="image/*" >
                             <img src="{{asset('storage/images/' . $post->image) }}" alt="">
                        </div>
                        <div class="post_title">
                             <input type="text" name="post[title]" value="{{ $post->title }}">
                        </div>
                        <div class='post_body'>
                            <h2>本文</h2>
                            <textarea name="post[body]">{{ $post->body }}</textarea>
                        </div>
                        <div class="category">
                        <h2>カテゴリー</h2>
                        <select type="text" class="form-control" name="pref_id" id='pref_id'>
                              @foreach($prefs as $id => $name)
                                 <option value="{{ $id }}" {{ old('pref_id') == $id? 'selected' : '' }}>{{ $name }}</option>
                              @endforeach
                        </select>
                        <select name="post[category_id]">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <select name="post[time_category_id]">
                            @foreach($time_categories as $time_category)
                                <option value="{{ $time_category->id }}">{{ $time_category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                       <button class="go"><div style=" font-family: 'M PLUS 1', sans-serif;">　保存する　</div></button>
                    </form>
                     <div class="fotter">
                    <a href="route('posts.all')">
                        <button class="back">　< 戻る　</button>
                    </a>
                </div>
                </div>
            </div>
        </x-app-layout>
    </body>