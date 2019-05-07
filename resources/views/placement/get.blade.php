@extends('layouts.user.app')
@section('content')
    @include('layouts.errors')
    <div class="form center">
        <form action="{{route('update-placement')}}" method="POST">
            <div class="head">
                <span class="title">Редактируем запись №{{$placement->id}} раздела "Гостиницы, Хостелы, Базы отдыха"</span>
                <a href="{{route('placements')}}"><span class="icon back"><div class="info"><span>Подсказка:</span><p>Все записи</p></div></span></a>
            </div>
            <div class="body">
                {{ method_field('PUT') }}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{{$placement->id}}">
                <div class="fields">
                    <label>Наименование</label>
                    <input type="text" name="title" placeholder="Наименование" value="{{$placement->title}}" required>
                </div>
                <div class="fields">
                    <label>Тип</label>
                    <select name="type_id">
                        <option value="-1">Не указан</option>
                        @isset($types)
                            @foreach($types as $type)
                                @if($type->id === $placement->type_id)
                                    <option value="{{$type->id}}" selected>{{$type->title}}</option>
                                @else
                                    <option value="{{$type->id}}">{{$type->title}}</option>
                                @endif
                            @endforeach
                        @endisset
                    </select>
                </div>
                <div class="fields">
                    <label>Кол-во звезд</label>
                    <input type="number" name="number_of_stars" placeholder="Кол-во звезд" value="{{$placement->number_of_stars}}">
                </div>
                <div class="fields">
                    <label>Адрес</label>
                    <input type="text" name="address" placeholder="Адрес" value="{{$placement->address}}" required>
                </div>
                <div class="fields">
                    <label>Контактное лицо</label>
                    <input type="text" name="contact_name" placeholder="Контактное лицо" value="{{$placement->contact_name}}">
                </div>
                <div class="fields">
                    <label>Телефон</label>
                    <input type="tel" name="phone" placeholder="Телефон" value="{{$placement->phone}}">
                </div>
                <div class="fields">
                    <label>Почта</label>
                    <input type="email" name="email" placeholder="Почта" value="{{$placement->email}}">
                </div>
                <div class="fields">
                    <label>Группа соц. сетей</label>
                    <select name="entity_id">
                        <option value="-1">Нет группы</option>
                        @isset($entities)
                            @foreach($entities as $entity)
                                @if($entity->id === $placement->social_entities_id)
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
                    <input type="url" name="url_site" placeholder="https://example.com"  value="{{$placement->url_site}}">
                </div>
                <div class="fields">
                    <input type="submit" value="Изменить">
                </div>
            </div>
        </form>
    </div>
@endsection