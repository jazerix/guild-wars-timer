<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="theme-color" content="#b1120e">
        <meta name="apple-mobile-web-app-status-bar-style" content="#b1120e">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <title>Live GW2</title>
    </head>
    <body>
        <div id="app">
            <app></app>
        </div>
        
        <script>
        if('serviceWorker' in navigator) {
        navigator.serviceWorker
                .register('/sw.js', {scope: '/'});
        }
        </script>
        <script src="{{ asset('js/app.js') }}"></script>
        
    </body>
</html>
