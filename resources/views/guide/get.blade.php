@extends('layouts.user.app')
@section('content')
    @include('layouts.errors')
    <div class="form center">
        <form action="{{route('update-guide')}}" method="POST">
            <div class="head">
                <span class="title">Редактируем запись №{{$guide->id}} раздела "Экскурсоводы"</span>
                <a href="{{route('guides')}}"><span class="icon back"><div class="info"><span>Подсказка:</span><p>Все записи</p></div></span></a>
            </div>
            <div class="body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                {{ method_field('PUT') }}

                <input type="hidden" name="id" value="{{$guide->id}}">

                <div class="fields">
                    <label>Фирма</label>
                    <input type="text" name="company_name" placeholder="Фирма" value="{{$guide->company_name}}">
                </div>

                <div class="fields">
                    <label>ФИО</label>
                    <input type="text" name="fullname" placeholder="ФИО" value="{{$guide->fullname}}" required>
                </div>

                <div class="fields">
                    <label>Образование</label>
                    <input type="text" name="education" placeholder="Образование" value="{{$guide->Education}}">
                </div>

                <div class="fields">
                    <label>Телефон</label>
                    <input type="tel" name="phone" placeholder="Телефон" value="{{$guide->phone}}">
                </div>

                <div class="fields">
                    <label>Почта</label>
                    <input type="email" name="email" placeholder="Почта" value="{{$guide->email}}">
                </div>

                <div class="fields">
                    <input type="submit" value="Изменить">
                </div>
            </div>
        </form>
    </div>
@endsection