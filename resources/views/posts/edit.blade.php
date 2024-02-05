<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>投稿作成画面</title>
        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <div style="font-family: 'M PLUS 1', sans-serif;">投稿編集画面</div>
             </x-slot>
             
             
             <form action="{{ route('posts.store',['post' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container">
                　<div class="mb-3">
                    <div class='post_images'>
                      <label for="formFileMultiple" class="form-label">追加する写真を選択してください</label>
                      <input class="form-control" type="file" id="formFileMultiple" multiple="multiple" name="images[]" value="{{ old('image') }}" accept="image/*">
                     </div>
                　</div>
                    
                  <div class="post_title">
                    <div class="form-floating mb-3">
                      <input type="text" name="post[title]" class="form-control" id="floatingInput" value="{{ $post->title }}">
                      <label for="floatingInput">title</label>
                      <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                    </div>
                  </div>
                  
                  <div class="post_body">
                    <div class="form-floating">
                      <textarea class="form-control" name="post[body]" id="floatingTextarea2" style="height: 100px">{{ $post->body }}</textarea>
                      <label for="floatingTextarea2">Comments</label>
                      <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
                    </div> 
                  </div>
                  
                  <div class="row g-3">
                      <div class="col-sm">
                        <select class="form-select" aria-label="Default select example" name="pref_id" id='pref_id'>
                            @foreach($prefs as $id => $name)
                                 <option value="{{ $id }}" {{ old('pref_id') == $id? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </select>
                        
                      </div>
                      <div class="col-sm">
                          <select class="form-select" aria-label="Default select example" name="post[category_id]">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                       
                      </div>
                      <div class="col-sm">
                        <select class="form-select" aria-label="Default select example"  name="post[time_category_id]">
                            @foreach($time_categories as $time_category)
                                <option value="{{ $time_category->id }}">{{ $time_category->name }}</option>
                            @endforeach
                        </select>
                      </div>
                  </div>
                  
                 <div class="post_hotel">
                    <div class="form-floating mb-3">
                      <input type="text" name="post[hotel]" class="form-control" id="floatingInput" value="{{ $post->hotel }}">
                      <label for="floatingInput">hotel name</label>
                      <p class="body__error" style="color:red">{{ $errors->first('post.hotel') }}</p>
                    </div>
                 </div>
                        
                    
                  <div class="col-12">
                    <button type="submit" class="btn btn-outline-primary">更新</button>
                  </div>
                </div>
            </form>
        </x-app-layout>
        
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> </body>