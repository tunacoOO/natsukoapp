<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ホテル検索</title>
        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <div style="font-family: 'M PLUS 1', sans-serif;">ホテル検索</div>
            </x-slot>
            

            <div class="container">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach($hotels as $hotel)
                        <div class="col">
                            <div class="card h-100 border-secondary mb-3">
                                <div class="card-header" style="height: 60px;">
                                    <strong>{{ $hotel['hotelName'] }}</strong>
                                </div>
                                <img src="{{ $hotel['hotelImageUrl'] }}" class="card-img-top" style="width: 100%; height: 350px; object-fit: contain;" alt="">
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <span class="material-symbols-outlined">
                                                location_on
                                            </span>
                                            {{ $hotel['address1'] }} {{ $hotel['address2'] }}
                                        </li>
                                        <li class="list-group-item">
                                            <span class="material-symbols-outlined">
                                                navigation
                                            </span>
                                            {{  $hotel['access'] }}
                                        </li>
                                        <li class="list-group-item">{{  $hotel['hotelSpecial'] }}</li>
                                    </ul>
                                    <button type="button" class="btn btn-outline-primary"> 
                                        <a href="{{ $hotel['hotelInformationUrl'] }}">ホテルurl</a>
                                    </button>
                              </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            
        </x-app-layout>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        
    </body>