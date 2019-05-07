<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>База данных Сахалинского Туристско-Информационного центра</title>
    <script src="{{asset('js/menu.js')}}"></script>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/menu-navigator.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/inputs.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/tables.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/icons.css') }}" type="text/css">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/png">
</head>
    <body>
        <main>
            @include('layouts.user.auth-block')
            <header>
                <a href="/">
                    <h1>База данных Сахалинского Туристско-Информационного центра</h1>
                    <img src="{{asset('images/logo.png')}}" alt="logo">
                </a>
            </header>

            @if(Auth::check() && Auth::user()->isEnabled())
            <div class="navigator">
                @include('layouts.user.navigator')
            </div>
            @endif
            <div class="content">
                @yield('content')
            </div>
            <footer></footer>
        </main>
    </body>
</html>

