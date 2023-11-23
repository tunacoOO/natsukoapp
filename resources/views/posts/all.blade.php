<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ホカるん</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600">
        <link rel="stylesheet" href="{{ asset('css/show.css') }}">
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
        　ホテルご飯投稿一覧
   　　　　 </x-slot>
        <div class='posts' style="padding: 1rem;">
            @foreach ($posts as $post)
                <div class='post' style="padding: 1rem; margin-bottom: 1rem; border: 1px solid dimgray; display: flex;">
                    <div style="width: 4em;">
                       <img src="{{asset(session('img_path'))}}" alt="">
                    </div>
                    <div style="flex-grow: 1">
                        <p class='title'>{{ $post->title }}</p>
                        <p class='body'>{{ $post->body }}</p>
                        <p>{{ $post->prefName }}</p>
                        <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                        <a href="/time_categories/{{ $post->time_category->id }}">{{ $post->time_category->name }}</a>
                        
                        @if($post->user_id == Auth::id())
                            <div style="display: flex; justify-content: end; align-items: end">
                                <div class="edit" style="margin-right: 1rem"><a href="{{route('posts.edit', ['post' => $post->id])}}">edit</a></div>
                                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="deletePost({{ $post->id }})">delete</button>
                                </form>
                            </div>
                        @endif
                        <div style="text-align: right; color: red;">
                            <small style="margin-left: 2rem;">{{is_null($post->user) ? '': $post->user->name}}</small>
                        </div>
                        
                        <p>{{ $post->likes->count() }}いいね</p>
                        @if($post->likes->contains('user_id',auth()->id()))
                            <form action="{{ route('posts.unlike',$post )}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">いいねを取り消す</button>
                            </form>
                        @else
                            <form action="{{ route('posts.like',$post) }}" method="POST">
                                @csrf
                                <button type="submit">いいね</button>
                            </form>
                        @endif
                        <div style="text-align: right;"></div>
                    </div>
                </div>
            @endforeach
        </div>
        <script>
            function deletePost(id) {
                'use strict'
        
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>


        </x-app-layout>
    </body>