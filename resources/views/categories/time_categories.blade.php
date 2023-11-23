<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ホカるん</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600">
        <link rel="stylesheet" href="./css/show.css">
    </head>
    <body>
        <x-app-layout>
           <h1 style="padding: 1rem; display: flex; font-size: 1.5rem">
                <img style="height: 1em" src="{{ asset('images/time_icon/' . $time_category->code . '.jpg') }}" alt="{{ $time_category->name }}">
                {{ $time_category->name }}
            </h1>
            <hr>
        <div class='posts'>
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
            @endforeach
        </div>
        </x-app-layout>
    </body>