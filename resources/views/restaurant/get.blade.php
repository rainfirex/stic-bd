@extends('layouts.user.app')
@section('content')
    @include('layouts.errors')
    <div class="form center">
        <form action="{{route('update-restaurant')}}" method="post">
            <div class="head">
                <span class="title">Редактируем запись №{{$restaurant->id}} раздела "Рестораны"</span>
                <a href="{{route('restaurants')}}"><span class="icon back"><div class="info"><span>Подсказка:</span><p>Все записи</p></div></span></a>
            </div>
            <div class="body">
                <input type="hidden" name="id" value="{{$restaurant->id}}">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                {{ method_field('PUT') }}

                <div class="fields">
                    <label>Наименование</label>
                    <input type="text" name="title" placeholder="Наименование" value="{{$restaurant->title}}">
                </div>

                <div class="fields">
                    <label>Контактное лицо</label>
                    <input type="text" name="contact_name" placeholder="Контактное лицо" value="{{$restaurant->contact_name}}">
                </div>

                <div class="fields">
                    <label>Телефон</label>
                    <input type="tel" name="phone" placeholder="Телефон" value="{{$restaurant->phone}}">
                </div>

                <div class="fields">
                    <label>Почта</label>
                    <input type="email" name="email" placeholder="Почта" value="{{$restaurant->email}}">
                </div>
                <div class="fields">
                    <label>Группа соц. сетей</label>
                    <select name="entity_id">
                        <option value="-1">Нет группы</option>
                        @isset($entities)
                            @foreach($entities as $entity)
                                @if($entity->id === $restaurant->social_entities_id)
                                    <option value="{{$entity->id}}" selected>{{$entity->title}}</option>
                                @else
                                    <option value="{{$entity->id}}">{{$entity->title}}</option>
                                @endif
                            @endforeach
                        @endisset
                    </select>
                </div>
                <div class="fields">
                    <label>Адрес сайта</label>
                    <input type="url" name="url_site" placeholder="https://example.com"  value="{{$restaurant->url_site}}">
                </div>
                <div class="fields">
                    <input type="submit" value="Изменить">
                </div>
            </div>
        </form>
    </div>
@endsection