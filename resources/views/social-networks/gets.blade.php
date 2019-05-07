@extends('layouts.user.app')
@section('content')
    @include('layouts.errors')
    @if(count($socials) > 0)
        <div class="table-responsive">
        <table class="table">
            <tr>
                <td colspan="4" class="table-header">
                    <span class="title">Социальные сети</span>
                    <a href="{{route('social-networks')}}"><span class="icon refresh"><div class="info"><span>Подсказка:</span><p>Все записи</p></div></span></a>
                    <a href="{{route('form-create-social')}}"><span class="icon create"><div class="info"><span>Подсказка:</span><p>Добавить</p></div></span></a>
                    <a href="#" id="btn_search"><span class="icon search"><div class="info"><span>Подсказка:</span><p>Поиск</p></div></span></a>
                </td>
            </tr>
            <tr>
                <th>Наименование</th>
                <th>Социальная сеть</th>
                <th>URL</th>
                <th width="100">Действие</th>
            </tr>
            @foreach($socials as $social )
                <tr>
                    <td>{{$social->entity->title}}</td>
                    <td>{{$social->type}}</td>
                    <td>{{$social->url}}</td>
                    <td >
                        <a href="{{route('delete-social', $social->id)}}"><span class="icon delete"><div class="info"><span>Подсказка:</span><p>Удалить</p></div></span></a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    @else
        <div class="form">
            <p>
                Таблица пуста, создать <a href="{{route('form-create-social')}}">новую</a> запись?
            </p>
        </div>
    @endif
@endsection