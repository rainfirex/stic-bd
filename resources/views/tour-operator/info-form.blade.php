@extends('layouts.user.app')
@section('content')
    <div class="form">
        <div class="head">
            <span class="title">Просмотр записи №{{$operator->id}} раздела "Туроператоры"</span>
            <a href="{{route('tour-operators')}}"><span class="icon back"><div class="info"><span>Подсказка:</span><p>Все записи</p></div></span></a>
            <a href="{{route('edit-tour-operator', $operator->id)}}"><span class="icon edit"><div class="info"><span>Подсказка:</span><p>Редактировать</p></div></span></a>
        </div>
        <div class="body">
            <div class="row">
                <div class="col-md-3 offset-2">
                    <label>Туроператор:</label>
                </div>
                <div class="col-md-5">
                    <label>{{$operator->title}}</label>
                </div>
            </div>
            @if($operator->contact_name)
                <div class="row">
                <div class="col-md-3 offset-2">
                    <label>Контактное лицо:</label>
                </div>
                <div class="col-md-5">
                    <label>{{$operator->contact_name}}</label>
                </div>
            </div>
            @endif
            @if($operator->url_site)
                <div class="row">
                    <div class="col-md-3 offset-2">
                        <label>Сайт:</label>
                    </div>
                    <div class="col-md-5">
                        <a href="{{$operator->url_site}}" target="_blank">{{$operator->url_site}}</a>
                    </div>
                </div>
            @endif
            @if($operator->phone)
                <div class="row">
                    <div class="col-md-3 offset-2">
                        <label>Телефон:</label>
                    </div>
                    <div class="col-md-5">
                        <a href="tel:{{$operator->phone}}">{{$operator->phone}}</a>
                    </div>
                </div>
            @endif
            @if($operator->email)
                <div class="row">
                    <div class="col-md-3 offset-2">
                        <label>Почта:</label>
                    </div>
                    <div class="col-md-5">
                        <a href="mailto:{{$operator->email}}">{{$operator->email}}</a>
                    </div>
                </div>
            @endif
            @if($operator->socialEntity)
                <h4 class="center">Группа: {{$operator->socialEntity->title}}</h4>
            @endif
            @isset($operator->socialEntity->socials)
                <ul>
                    @foreach($operator->socialEntity->socials as $social)
                        <li>
                            <a href="{{$social->url}}" target="_blank">{{$social->type}}</a>
                        </li>
                    @endforeach
                </ul>
            @endisset
        </div>
    </div>
@endsection