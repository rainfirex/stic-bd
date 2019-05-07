@extends('layouts.user.app')
@section('content')
    <div class="form">
        <div class="head">
            <span class="title">Просмотр записи №{{$restaurant->id}} раздела "Рестораны"</span>
            <a href="{{route('restaurants')}}"><span class="icon back"><div class="info"><span>Подсказка:</span><p>Все записи</p></div></span></a>
            <a href="{{route('edit-restaurant', $restaurant->id)}}"><span class="icon edit"><div class="info"><span>Подсказка:</span><p>Редактировать</p></div></span></a>
        </div>
        <div class="body">
            <div class="row">
                <div class="col-md-3 offset-2">
                    <label>Ресторан: </label>
                </div>
                <div class="col-md-5">
                    <label>{{$restaurant->title}}</label>
                </div>
            </div>
            @if($restaurant->contact_name)
                <div class="row">
                    <div class="col-md-3 offset-2">
                        <label>Контактное лицо: </label>
                    </div>
                    <div class="col-md-5">
                        <label>{{$restaurant->contact_name}}</label>
                    </div>
                </div>
            @endif
            @if($restaurant->url_site)
                <div class="row">
                    <div class="col-md-3 offset-2">
                        <label>Сайт: </label>
                    </div>
                    <div class="col-md-5">
                        <a href="{{$restaurant->url_site}}" target="_blank">{{$restaurant->url_site}}</a>
                    </div>
                </div>
            @endif
            @if($restaurant->phone)
                <div class="row">
                    <div class="col-md-3 offset-2">
                        <label>Телефон: </label>
                    </div>
                    <div class="col-md-5">
                        <a href="tel:{{$restaurant->phone}}">{{$restaurant->phone}}</a>
                    </div>
                </div>
            @endif
            @if($restaurant->email)
                <div class="row">
                    <div class="col-md-3 offset-2">
                        <label>Почта: </label>
                    </div>
                    <div class="col-md-5">
                        <a href="mailto:{{$restaurant->email}}">{{$restaurant->email}}</a>
                    </div>
                </div>
            @endif
            @isset($restaurant->socialEntity->socials)
                <ul>
                    @foreach($restaurant->socialEntity->socials as $social)
                        <li>
                            <a href="{{$social->url}}" target="_blank">{{$social->type}}</a>
                        </li>
                    @endforeach
                </ul>
            @endisset
        </div>
    </div>
@endsection