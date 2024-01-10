<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ホテル検索結果</title>
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
                <div style="font-family: 'M PLUS 1', sans-serif;">ホテル検索結果</div>
            </x-slot>
        <div class="container">
            <h1>検索結果</h1>
                <ul>
                    @foreach ($hotels as $hotel)
                    <li>
                        <a href="/create?hotel={{ $hotel->name }}">{{ $hotel->name }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </x-app-layout>
    </body>