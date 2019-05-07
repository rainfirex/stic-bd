@extends('layouts.user.app')
@section('content')
    <div class="form">
        <div class="head">
            <span class="title">Просмотр записи №{{$placement->id}} раздела "Гостиницы, Хостелы, Базы отдыха"</span>
            <a href="{{route('placements')}}"><span class="icon back"><div class="info"><span>Подсказка:</span><p>Все записи</p></div></span></a>
            <a href="{{route('edit-placement', $placement->id)}}"><span class="icon edit"><div class="info"><span>Подсказка:</span><p>Редактировать</p></div></span></a>
        </div>
        <div class="body">
            @if($placement)
                <div class="row">
                    <div class="col-md-3 offset-2">
                        @isset($placement->typePlacement->title)
                            <label>{{$placement->typePlacement->title}}:</label>
                        @else
                            <label>null:</label>
                        @endisset
                    </div>
                    <div class="col-md-5">
                        <label>{{$placement->title}}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 offset-2">
                        <label>Адрес:</label>
                    </div>
                    <div class="col-md-5">
                        <label>{{$placement->address}}</label>
                    </div>
                </div>
                @if($placement->contact_name)
                    <div class="row">
                        <div class="col-md-3 offset-2">
                            <label>Контактное лицо:</label>
                        </div>
                        <div class="col-md-5">
                            <label>{{$placement->contact_name}}</label>
                        </div>
                    </div>
                @endif
                @if($placement->url_site)
                    <div class="row">
                        <div class="col-md-3 offset-2">
                            <label>Сайт:</label>
                        </div>
                        <div class="col-md-5">
                            <a href="{{$placement->url_site}}" target="_blank">{{$placement->url_site}}</a>
                        </div>
                    </div>
                @endif
                @if($placement->phone)
                    <div class="row">
                        <div class="col-md-3 offset-2">
                            <label>Телефон:</label>
                        </div>
                        <div class="col-md-5">
                            <a href="tel:{{$placement->phone}}">{{$placement->phone}}</a>
                        </div>
                    </div>
                @endif
                @if($placement->email)
                    <div class="row">
                        <div class="col-md-3 offset-2">
                            <label>Почта:</label>
                        </div>
                        <div class="col-md-5">
                            <a href="mailto:{{$placement->email}}">{{$placement->email}}</a>
                        </div>
                    </div>
                @endif
                @isset($placement->socialEntity->title)
                    <h4 class="center">Группа: {{$placement->socialEntity->title}}</h4>
                @endif
                @isset($placement->socialEntity->socials)
                <ul>
                    @foreach($placement->socialEntity->socials as $social)
                        <li>
                            <a href="{{$social->url}}" target="_blank">{{$social->type}}</a>
                        </li>
                    @endforeach
                </ul>
            @endisset
            @endif
        </div>
    </div>
@endsection