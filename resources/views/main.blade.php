<!doctype html>
<html lang="{{ app()->getLocale() }}">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="theme-color" content="#b1120e">
      <meta name="apple-mobile-web-app-status-bar-style" content="#b1120e">
      <meta name="description" content="Guild Wars 2 Event timers">
      <meta name="keywords" content="GW,GW2,Gaming,Guild Wars">
      <meta name="author" content="Niels Faurskov"/>
      <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
      <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
      <title>Live GW2</title>
      @if(!env('APP_DEBUG', false))
      <script>
         (function(h,o,t,j,a,r){
             h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
             h._hjSettings={hjid:745804,hjsv:6};
             a=o.getElementsByTagName('head')[0];
             r=o.createElement('script');r.async=1;
             r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
             a.appendChild(r);
         })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
      </script>
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-112418996-1"></script>
      <script>
         window.dataLayer = window.dataLayer || [];
         function gtag(){dataLayer.push(arguments);}
         gtag('js', new Date());
         
         gtag('config', 'UA-112418996-1');
      </script>
      @endif
   </head>
   <body>
      <div id="app">
         <app></app>
      </div>
      <script src="{{ asset('js/app.js') }}"></script>
   </body>
</html>