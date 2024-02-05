<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ホテル検索</title>
        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600">
        <link rel="stylesheet" href="{{ asset('./css/create.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1:wght@400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <div style="font-family: 'M PLUS 1', sans-serif;">ホテル検索</div>
            </x-slot>
            
           <div class="container">
            <div class="row">
                @if(isset($hotels))
                    @forelse($hotels as $hotel)
                    <div class="accordion" id="accordionExample">
                       
                        <div class="col">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $hotel['hotelNo'] }}" aria-expanded="true" aria-controls="collapseOne">
                                {{ $hotel['hotelName'] }}
                              </button>
                            </h2>
                            <div id="collapse{{ $hotel['hotelNo'] }}" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                <strong>{{ $hotel['address1'] }} {{ $hotel['address2'] }}</strong> 
                                <a href="{{ $hotel['hotelInformationUrl'] }}">ホテルurl</a>
                              </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>aaaaa</p>
                    </div>
                     @endforelse
                @else
                <p>sssss</p>
                 @endif
            </div>
            
            
            </div>
            
        </x-app-layout>
        
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        
    </body>