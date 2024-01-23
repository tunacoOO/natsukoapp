<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ホカるん</title>
        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('./css/dashboard.css') }}">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    </head>
    <body style="background-color: #FFFFEE;">
        <x-app-layout>
            
            
        <div class="container">      
        <form method="GET" action="/search">
          @csrf
          <input id="keyword" type="text" value="" name="keyword" placeholder="ホテルキーワード">
          <button> <span class="material-symbols-outlined">
                    search
                </span></button>
        </form>
                            
                            
            <form action="{{ route('posts.all') }}" style="margin-top: 1rem;">
               <select type="text" name="pref_id">
                        @foreach($prefs as $index => $name)
                             <option value="" hidden>都道府県▼</option>
                             <option value="{{ $index }}">{{ $name }}</option>
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
               <button> <span class="material-symbols-outlined">
                    search
                </span></button>
            </form>

             
             <secion class="rsttop-othersearch__main">
                 <div class="rsttop-search__heading">
                     <h2 class="rsttop-search__title">
                         <span class="material-symbols-outlined">
                            restaurant_menu
                        </span>
                         料理
                         <span class="material-symbols-outlined">
                            restaurant_menu
                        </span>
                         </h2>
                 
                         
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
                     <h2 class="rsttop-search__title">
                         <span class="material-symbols-outlined">
                            sunny
                        </span>
                         状況
                         <span class="material-symbols-outlined">
                            bedtime
                        </span>
                         </h2>
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
             </div>
         </x-app-layout>
         
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>
</html>