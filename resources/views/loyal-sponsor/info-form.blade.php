@extends('layouts.user.app')
@section('content')
    <div class="form">
        <div class="head">
            <span class="title">Просмотр записи №{{$loyal->id}} раздела "Лояльные спонсоры"</span>
            <a href="{{route('loyal-sponsors')}}"><span class="icon back"><div class="info"><span>Подсказка:</span><p>Все записи</p></div></span></a>
            <a href="{{route('edit-loyal-sponsor', $loyal->id)}}"><span class="icon edit"><div class="info"><span>Подсказка:</span><p>Редактировать</p></div></span></a>
        </div>
        <div class="body">
            <div class="row">
                <div class="col-md-3 offset-2">
                    <label>Спонсор: </label>
                </div>
                <div class="col-md-5">
                    <label>{{$loyal->title}}</label>
                </div>
            </div>
            @if($loyal->contact_name)
                <div class="row">
                    <div class="col-md-3 offset-2">
                        <label>Контактное лицо: </label>
                    </div>
                    <div class="col-md-5">
                        <label>{{$loyal->contact_name}}</label>
                    </div>
                </div>
            @endif
            @if($loyal->url_site)
                <div class="row">
                    <div class="col-md-3 offset-2">
                        <label>Сайт: </label>
                    </div>
                    <div class="col-md-5">
                        <a href="{{$loyal->url_site}}" target="_blank">{{$loyal->url_site}}</a>
                    </div>
                </div>
            @endif
            @if($loyal->phone)
                <div class="row">
                    <div class="col-md-3 offset-2">
                        <label>Телефон: </label>
                    </div>
                    <div class="col-md-5">
                        <a href="tel:{{$loyal->phone}}">{{$loyal->phone}}</a>
                    </div>
                </div>
            @endif
            @if($loyal->email)
                <div class="row">
                    <div class="col-md-3 offset-2">
                        <label>Почта: </label>
                    </div>
                    <div class="col-md-5">
                        <a href="mailto:{{$loyal->email}}">{{$loyal->email}}</a>
                    </div>
                </div>
            @endif
            @isset($loyal->socialEntity->socials)
                <ul>
                    @foreach($loyal->socialEntity->socials as $social)
                        <li>
                            <a href="{{$social->url}}" target="_blank">{{$social->type}}</a>
                        </li>
                    @endforeach
                </ul>
            @endisset
        </div>
    </div>
@endsection