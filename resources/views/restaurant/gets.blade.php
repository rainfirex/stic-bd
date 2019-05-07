@extends('layouts.user.app')
@section('content')
    @include('layouts.errors')
    @if(count($restaurants) >0)
        <div class="table-responsive">
        <table id="table">
            <tr>
                <td colspan="7" class="table-header">
                    <span class="title">Рестораны</span>
                    <a href="{{route('restaurants')}}"><span class="icon refresh"><div class="info"><span>Подсказка:</span><p>Все записи</p></div></span></a>
                    <a href="{{route('form-create-restaurant')}}"><span class="icon create"><div class="info"><span>Подсказка:</span><p>Добавить</p></div></span></a>
                    <a href="#" id="btn_search"><span class="icon search"><div class="info"><span>Подсказка:</span><p>Поиск</p></div></span></a>
                    <a href="{{route('form-create-social')}}"><span class="icon instagram"><div class="info"><span>Подсказка:</span><p>Соц. сети</p></div></span></a>
                </td>
            </tr>
            <tr>
                <th>Наименование</th>
                <th>Контактное лицо</th>
                <th>Телефон</th>
                <th>Почта</th>
                <th>Соц. сети</th>
                <th>Cайт</th>
                <th>Действие</th>
            </tr>
            @foreach($restaurants as $restaurant )
                <tr data-href="{{route('info-restaurant', $restaurant->id)}}">
                    <td>{{$restaurant->title}}</td>
                    <td>{{$restaurant->contact_name}}</td>
                    <td>{{$restaurant->phone}}</td>
                    <td><a href="mailto:{{$restaurant->email}}">{{$restaurant->email}}</a></td>
                    @if($restaurant->social_entities_id > 0)
                        {{--<td><a href="{{$restaurant->socialEntity->id}}">{{$restaurant->socialEntity->title}}</a></td>--}}
                        <td>{{$restaurant->socialEntity->title}}</td>
                    @else
                        <td>Нет группы</td>
                    @endif
                    <td><a href="{{$restaurant->url_site}}" target="_blank">{{$restaurant->url_site}}</a></td>
                    <td>
                        <a href="{{route('edit-restaurant', $restaurant->id)}}"><span class="icon edit"><div class="info"><span>Подсказка:</span><p>Редактировать</p></div></span></a>
                        <a href="{{route('delete-restaurant', $restaurant->id)}}"><span class="icon delete"><div class="info"><span>Подсказка:</span><p>Удалить</p></div></span></a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    @else
        <div class="form">
            <p>
                Таблица пуста, создать <a href="{{route('form-create-restaurant')}}">новую</a> запись?
            </p>
        </div>
    @endif

    <script src="{{asset('js/table-href.js')}}"></script>
    @isset($searcher)
        @include('layouts.form-search', ['action' => $searcher->action, 'columns' => $searcher->columns])
    @endisset
@endsection