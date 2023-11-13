<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ホカるん</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600">
        <link rel="stylesheet" href="{{ asset('./css/dashboard.css') }}">
    </head>
    <body>
        <x-app-layout>
            <form action="{{route('posts.all')}}" style="margin-top: 1rem;">
               <select type="text" class="form-control" name="post[prefecture]">
                        @foreach(config('pref') as $key => $prefecture )
                            <option value="{{ $key }}">{{ $prefecture }}</option>
                        @endforeach
                    </select>
               
                <select name="category_id">
                    <option value="">すべて</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                
                <select name="time_category_id">
                    <option value="">すべて</option>
                    @foreach($time_categories as $time_category)
                        <option value="{{ $time_category->id }}">{{ $time_category->name }}</option>
                    @endforeach
                </select>
                
                <input type="text" name="body" placeholder="キーワード">
                <button>検索</button>
            </form>

            <a href="{{route('posts.all')}}">投稿一覧</a>
             
             <secion class="rsttop-othersearch__main">
                 <div class="rsttop-search__heading">
                     <h2 class="rsttop-search__title">〚料理カテゴリーから探す〛</h2>
                 
                         
                 <div>
                    @foreach($categories as $category)
                         <div class="rsttop-othersearch__item">
                             <a href="{{route('category.show', ['category' => $category->id])}}">
                                 <img src="{{ asset('images/dish_icon/' . $category->code . '.jpg') }}" alt="{{ $category->name }}">
                             </a>
                         </div>
                    @endforeach
                </div>
             </secion>
             
             
             <section class="rsttop-servicesearch__main">
                 <div class="rsttop-search__heading">
                     <h2 class="rsttop-search__title">〚状況から探す〛</h2>
                 </div>
                 <div>
                    @foreach($time_categories as $time_category)
                         <div class="rsttop-othersearch__item">
                             <a href="{{route('category.time', ['time_category' => $time_category->id])}}">
                                 <img src="{{ asset('images/time_icon/' . $time_category->code . '.jpg') }}" alt="{{ $time_category->name }}">
                             </a>
                         </div>
                    @endforeach
                </div>
                 
             </secion>
         </x-app-layout>
    </body>
</html>