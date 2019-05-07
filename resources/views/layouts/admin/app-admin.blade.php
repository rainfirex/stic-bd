<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>База данных Сахалинского Туристско-Информационного центра</title>
    <script src="{{asset('js/menu.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/inputs.css') }}" type="text/css">
    {{--<link rel="stylesheet" href="{{ asset('css/tables.css') }}" type="text/css">--}}
    {{--<link rel="stylesheet" href="{{ asset('css/forms.css') }}" type="text/css">--}}
    <link rel="stylesheet" href="{{ asset('css/admin/menu-bar.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/icons.css') }}" type="text/css">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/png">
</head>
<body>
@if(Auth::check())
    <main>
        <nav>
            <h3>Разделы</h3>
            <ul>
                <li><a href="{{route('form-users')}}">Пользователи</a></li>
                <li><a href="{{route('form-roles')}}">Роли</a></li>
                <li><a href="{{route('form-access')}}">Доступы</a></li>
            </ul>
            <a href="\" class="btn-exit">Выход</a>
        </nav>
        <div class="content">
            @yield('content')
        </div>
    </main>
@endif
</body>
</html>

