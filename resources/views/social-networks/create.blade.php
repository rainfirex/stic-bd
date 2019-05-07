@extends('layouts.user.app')
@section('content')
@include('layouts.errors')
    <div class="form center">
        <form action="{{route('create-social')}}" method="post">
            <div class="head">
                <span class="title">Новая запись "Социальные сети"</span>
                <a href="{{route('social-networks')}}"><span class="icon back"><div class="info"><span>Подсказка:</span><p>Все записи</p></div></span></a>
                <a href="{{route('form-create-entity')}}"><span class="icon create"><div class="info"><span>Подсказка:</span><p>добавить</p></div></span></a>
            </div>

            <div class="body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="fields">
                    <label>Наименование</label>
                    <select name="title_id">
                        @foreach($entities as $entity)
                            <option value="{{$entity->id}}">{{$entity->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="fields">
                    <label>Социальная сеть</label>
                    <select name="type">
                        <option value="Instagram">Instagram</option>
                        <option value="Twitter">Twitter</option>
                        <option value="Facebook">Facebook</option>
                        <option value="ВКонта́кте">ВКонта́кте</option>
                        <option value="Одноклассники">Одноклассники</option>
                    </select>
                </div>
                <div class="fields">
                    <label>URL</label>
                    <input type="url" name="url" placeholder="https://example.com" required>
                </div>

                <div class="fields">
                    <input type="submit" value="Создать">
                </div>
            </div>
        </form>
    </div>
@endsection