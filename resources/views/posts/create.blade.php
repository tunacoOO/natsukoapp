<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ホカるん投稿</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600">
        <link rel="stylesheet" href="{{ asset('./css/create.css') }}">
    </head>
    <body>
        <x-app-layout>
            <form action="/posts" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="post_images">
                    <input type="file" name="post[images]" value="{{ old('post.images') }}" />
                    <p class="images__error" style="color:red">{{ $errors->first('post.images') }}</p>
                    <img src="{{ asset(session('img_path')) }}" alt="">
                </div>
                <div class="post_title">
                     <input type="text" name="post[title]" placeholder="タイトル"/>
                     <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                </div>
                <div class="post_body">
                    <textarea name="post[body]" placeholder="みんなにこれを伝えたい！">{{ old('post.body') }}</textarea>
                    <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
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
                <input type="submit" value="store"/>
            </form>
            <div class="fotter">
                <a href="/">back</a>
            </div>
        </x-app-layout>
    </body>