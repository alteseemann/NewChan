<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="/js/app.js" defer></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    </head>

    <body>
        @include('inc.burger_menu')
        <div class="content" id="main_content">
            <div class="container">
                @yield('content')
            </div>
        </div>
        <script src="/js/burger-menu.js"></script>
        <script>
            var csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            //var csrf_token = 'token'
        </script>
    </body>
</html>
