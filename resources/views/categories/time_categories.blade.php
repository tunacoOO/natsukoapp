<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ホカるん</title>
        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link rel="stylesheet" href="./css/show.css">
    </head>
    <body>
        <x-app-layout>
          <x-slot name="header">
           <h1 style="padding: 1rem; display: flex; font-size: 1.5rem">
                <img style="height: 1em" src="{{ asset('images/time_icon/' . $time_category->code . '.jpg') }}" alt="{{ $time_category->name }}">
                {{ $time_category->name }}
            </h1>
            </x-slot>
            
        <div class="container">
            <div class="row">
                @foreach ($posts as $post)
                <div class="col-sm-4">
                    <div class="card">
                        
                      @foreach($post->images as $image)
                        <div id="carouselExampleIndicators" class="carousel slide">
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                              <img src="{{asset($image->path) }}" class="d-block w-100" alt="">
                            </div>
                            <div class="carousel-item">
                              <img src="{{asset($image->path)}}" class="d-block w-100" alt="">
                            </div>
                            <div class="carousel-item">
                              <img src="{{asset($image->path) }}" class="d-block w-100" alt="">
                            </div>
                          </div>
                          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                          </button>
                          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                          </button>
                        </div>
                        @endforeach
                    
                          <div class="card-body">
                            <p class="card-title">{{ $post->prefName }}</p>
                            <p class='card-title'>{{ $post->hotel }}</p>
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->body }}</p>
                            <a href="/categories/{{ $post->category->id }}" class="card-title">{{ $post->category->name }}</a>
                            <a href="/time_categories/{{ $post->time_category->id }}" class="card-title">{{ $post->time_category->name }}</a>
                            
                            
                            @if($post->user_id == Auth::id())
                                <div style="display: flex; justify-content: end; align-items: end">
                                    <div style="margin-right: 1rem">
                                        <a href="{{route('posts.edit', ['post' => $post->id])}}">
                                            <button class="edit">
                                                <span class="material-symbols-outlined">
                                                    edit
                                                </span>
                                            </button>
                                        </a>
                                    </div>
                                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="delete" onclick="deletePost({{ $post->id }})">
                                            <span class="material-symbols-outlined">
                                                delete
                                            </span>
                                        </button>
                                    </form>
                                </div>
                            @endif
                            <div style="text-align: right; color: red;">
                                <small style="margin-left: 2rem;">{{is_null($post->user) ? '': $post->user->name}}</small>
                            </div>
                            
                            <div style="text-align: right;">
                            @if($post->likes->contains('user_id',auth()->id()))
                                <form action="{{ route('posts.unlike',$post )}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <span class="material-symbols-outlined" style="color:red;">
                                            favorite
                                        </span>
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('posts.like',$post) }}" method="POST">
                                    @csrf
                                    <button type="submit">
                                        <span class="material-symbols-outlined">
                                            favorite
                                        </span>
                                    </button>
                                </form>
                            @endif
                            <p>{{ $post->likes->count() }}</p>
                            </div>
                        </div>
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

        </div>
        </x-app-layout>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>