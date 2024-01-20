<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>投稿作成画面</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600">
        <link rel="stylesheet" href="{{ asset('./css/create.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1:wght@400&display=swap" rel="stylesheet">
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <div style="font-family: 'M PLUS 1', sans-serif;">投稿作成画面</div>
             </x-slot>
            <form action="/posts" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="create">
                    <div class="post_images">
                        <input type="file" multiple="multiple" name="post[image]" value="{{ old('post.images') }}" accept="image/*" >
                        <p class="images__error" style="color:red">{{ $errors->first('post.images') }}</p>
                        <img src="{{asset('storage/images/') }}" alt="">
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
                        <h2>
                           <div style="font-family: 'M PLUS 1', sans-serif;">カテゴリー</div>
                        </h2>
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
                    <div class="post_hotel">
                         <input type="text" name="post[hotel]" placeholder="ホテル名"/>
                    </div>
                    <button class="go">　投稿する　</button>
             </form>
                    </div>
                
                
        </x-app-layout>
    </body>