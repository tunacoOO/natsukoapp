<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ホテル検索</title>
        <!-- Fonts -->
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
            
        
            @if(isset($hotels))
            <div class='container'>
                @foreach($hotels as $hotel)
                <div class="hotel">
                    <p>{{ $hotel['hotelName'] }}</p>
                    <p>{{ $hotel['address1'] }}</p>
                    <p>{{ $hotel['address2'] }}</p>
                    <a href="{{ $hotel['hotelInformationUrl'] }}">ホテル情報</a>
                </div>
                @endforeach
            </div>
            @endif
        </x-app-layout>
    </body>