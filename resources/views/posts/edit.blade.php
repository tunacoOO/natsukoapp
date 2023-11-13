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
            <h1 class="title">編集画面</h1>
            <div class="content">
                <form action="/posts/{{ $post->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class='post_images'>
                        <h2>写真</h2>
                         <input type="file" name="post[images]" value="{{ old('post.images') }}" />
                         <img src="{{ asset(session('img_path')) }}" alt="">
                    </div>
                    <div class="post_title">
                         <input type="text" name="post[title]" value="{{ $post->title }}">
                    </div>
                    <div class='post_body'>
                        <h2>本文</h2>
                        <input type='text' name='post[body]' value="{{ $post->body }}">
                    </div>
                    <div class="category">
                    <h2>Category</h2>
                    <select type="text" class="form-control" name="post[prefecture]">
                        @foreach(config('pref') as $key => $prefecture )
                            <option value="{{ $key }}">{{ $prefecture }}</option>
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
                    <input type="submit" value="保存">
                </form>
            </div>
        </x-app-layout>
    </body>