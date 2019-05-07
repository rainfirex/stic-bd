@extends('layouts.user.app')
@section('content')
    @include('layouts.errors')
    <div class="form center">
        <form action="{{route('create-placement')}}" method="post">
            <div class="head">
                <span class="title">Новая запись "Гостиницы, Хостелы, Базы отдыха"</span>
                <a href="{{route('placements')}}"><span class="icon back"><div class="info"><span>Подсказка:</span><p>Все записи</p></div></span></a>
            </div>
            <div class="body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="fields">
                    <label>Наименование</label>
                    <input type="text" name="title" placeholder="Наименование" required>
                </div>
                <div class="fields">
                    <label>Тип</label>
                    <select name="type_id">
                        <option value="-1">Не указан</option>
                        @isset($types)
                            @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->title}}</option>
                            @endforeach
                        @endisset
                    </select>
                </div>
                <div class="fields">
                    <label>Кол-во звезд</label>
                    <input type="number" name="number_of_stars" placeholder="Кол-во звезд" min="0" max="5">
                </div>
                <div class="fields">
                    <label>Адрес</label>
                    <input type="text" name="address" placeholder="Адрес" required>
                </div>
                <div class="fields">
                    <label>Контактное лицо</label>
                    <input type="text" name="contact_name" placeholder="Контактное лицо">
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
                    <label>Группа соц. сетей</label>
                    <select name="entity_id">
                        <option value="-1">Нет группы</option>
                        @isset($entities)
                            @foreach($entities as $entity)
                                <option value="{{$entity->id}}">{{$entity->title}}</option>
                            @endforeach
                        @endisset
                    </select>
                </div>
                <div class="fields">
                    <label>Адрес сайта</label>
                    <input type="url" name="url_site" placeholder="https://example.com">
                </div>
                <div class="fields">
                    <input type="submit" value="Создать">
                </div>
            </div>
        </form>
    </div>
@endsection