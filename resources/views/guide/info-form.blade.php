@extends('layouts.user.app')
@section('content')
    <div class="form">
        <div class="head">
            <span class="title">Просмотр записи №{{$guide->id}} раздела "Экскурсоводы"</span>
            <a href="{{route('placements')}}"><span class="icon back"><div class="info"><span>Подсказка:</span><p>Все записи</p></div></span></a>
            <a href="{{route('edit-guide', $guide->id)}}"><span class="icon edit"><div class="info"><span>Подсказка:</span><p>Редактировать</p></div></span></a>
        </div>
        <div class="body">
            <div class="row">
                <div class="col-md-3 offset-2">
                    <label>ФИО:</label>
                </div>
                <div class="col-md-5">
                    <label>{{$guide->fullname}}</label>
                </div>
            </div>
            @if($guide->company_name)
                <div class="row">
                    <div class="col-md-3 offset-2">
                        <label>Фирма:</label>
                    </div>
                    <div class="col-md-5">
                        <label>{{$guide->company_name}}</label>
                    </div>
                </div>
            @endif
            @if($guide->Education)
                <div class="row">
                    <div class="col-md-3 offset-2">
                        <label>Образование:</label>
                    </div>
                    <div class="col-md-5">
                        <label>{{$guide->Education}}</label>
                    </div>
                </div>
            @endif
            @if($guide->phone)
                <div class="row">
                    <div class="col-md-3 offset-2">
                        <label>Телефон:</label>
                    </div>
                    <div class="col-md-5">
                        <a href="tel:{{$guide->phone}}">{{$guide->phone}}</a>
                    </div>
                </div>
            @endif
            @if($guide->email)
                <div class="row">
                    <div class="col-md-3 offset-2">
                        <label>Почта:</label>
                    </div>
                    <div class="col-md-5">
                        <a href="mailto:{{$guide->email}}">{{$guide->email}}</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection