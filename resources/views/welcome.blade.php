<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Resto du coeur</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- daisy ui -->
<!--          
        <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.tailwindcss.com"></script> -->



        <!-- Styles / Scripts -->
        <!-- @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            
        @endif -->
        @vite(['resources/css/app.css', 'resources/css/daisyui.css','resources/js/app.js', 'resources/js/daisyui.js'])
    </head>
    <body>
        <div id='app'></div>
       <!-- @vite('ressource/js/app.js') -->
        <div>
            <!-- <img src="{{asset('image/PManager.jpg')}}" alt=""> -->
        </div>
    </body>
</html>
