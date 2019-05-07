@extends('layouts.user.app')
@section('content')
    @include('layouts.errors')
    <div class="form center">
        <form action="{{route('create-guide')}}" method="post">
            <div class="head">
                <span class="title">Новая запись "Экскурсоводы"</span>
                <a href="{{route('guides')}}"><span class="icon back"><div class="info"><span>Подсказка:</span><p>Все записи</p></div></span></a>
            </div>
            <div class="body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="fields">
                    <label>Фирма</label>
                    <input type="text" name="company_name" placeholder="Фирма">
                </div>

                <div class="fields">
                    <label>ФИО</label>
                    <input type="text" name="fullname" placeholder="ФИО" required>
                </div>

                <div class="fields">
                    <label>Образование</label>
                    <input type="text" name="education" placeholder="Образование">
                </div>

                <div class="fields">
                    <label>Телефон</label>
                    <input type="tel" name="phone" placeholder="Телефон">
                </div>

                <div class="fields">
                    <label>Почта</label>
                    <input type="email" name="email" placeholder="Почта">
                </div>

                <div class="fields">
                    <input type="submit" value="Создать">
                </div>
            </div>
        </form>
    </div>
@endsection