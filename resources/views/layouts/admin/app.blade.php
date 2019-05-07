<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>База данных Сахалинского Туристско-Информационного центра</title>
    <script src="{{asset('js/menu.js')}}"></script>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/admin/inputs.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/admin/menu-bar.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/icons.css') }}" type="text/css">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/png">
</head>
<body>
@if(Auth::check())
    <main class="container-fluid">
        <div class="row">
            <div class="col-md-12 bg-black">
                @include('layouts.admin.header')
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-sm-3 bg-black">
                @include('layouts.admin.navigator')
            </div>
            <div class="col-md-10 bg-body">
                <div class="content">
                    @include('layouts.errors')
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
@endif
</body>
</html>

