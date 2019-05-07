@extends('layouts.user.app')
@section('content')
    @include('layouts.errors')
    <div class="form center">
        <form action="{{route('create-loyal-sponsor')}}" method="post">
            <div class="head">
                <span class="title">Новая запись "Лояльные спонсоры"</span>
                <a href="{{route('loyal-sponsors')}}"><span class="icon back"><div class="info"><span>Подсказка:</span><p>Все записи</p></div></span></a>
            </div>
            <div class="body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="fields">
                    <label>Наименование</label>
                    <input type="text" name="title" placeholder="Наименование" required>
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