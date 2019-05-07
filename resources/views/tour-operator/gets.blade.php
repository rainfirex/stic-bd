@extends('layouts.user.app')
@section('content')
    @include('layouts.errors')
    @if(count($operators) > 0)
        <div class="table-responsive">
        <table id="table">
            <tr>
                <td colspan="7" class="table-header">
                    <span class="title">Туроператоры</span>
                    <a href="{{route('tour-operators')}}"><span class="icon refresh"><div class="info"><span>Подсказка:</span><p>Все записи</p></div></span></a>
                    <a href="{{route('form-create-tour-operator')}}"><span class="icon create"><div class="info"><span>Подсказка:</span><p>Добавить</p></div></span></a>
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
            @foreach($operators as $operator )
                <tr data-href="{{route('info-tour-operator', $operator->id)}}">
                    <td>{{$operator->title}}</td>
                    <td>{{$operator->contact_name}}</td>
                    <td>{{$operator->phone}}</td>
                    <td><a href="mailto:{{$operator->email}}">{{$operator->email}}</a></td>
                    @if($operator->social_entities_id > 0)
                        {{--<td><a href="{{$operator->socialEntity->id}}">{{$operator->socialEntity->title}}</a></td>--}}
                        <td>{{$operator->socialEntity->title}}</td>
                    @else
                        <td>Нет группы</td>
                    @endif
                    <td><a href="{{$operator->url_site}}" target="_blank">{{$operator->url_site}}</a></td>
                    <td>
                        <a href="{{route('edit-tour-operator',$operator->id)}}"><span class="icon edit"><div class="info"><span>Подсказка:</span><p>Редактировать</p></div></span></a>
                        <a href="{{route('delete-tour-operator', $operator->id)}}"><span class="icon delete"><div class="info"><span>Подсказка:</span><p>Удалить</p></div></span></a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    @else
        <div class="form">
            <p>
                Таблица пуста, создать <a href="{{route('form-create-tour-operator')}}">новую</a> запись?
            </p>
        </div>
    @endif
    <script src="{{asset('js/table-href.js')}}"></script>
    @isset($searcher)
        @include('layouts.form-search', ['action' => $searcher->action, 'columns' => $searcher->columns])
    @endisset
@endsection