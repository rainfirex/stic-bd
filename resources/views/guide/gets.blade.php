@extends('layouts.user.app')
@section('content')
    @include('layouts.errors')
    @if(count($guides) > 0)
        <table id="table">
        <tr>
            <td colspan="6" class="table-header">
                <span class="title">Экскурсоводы</span>
                <a href="{{route('guides')}}"><span class="icon refresh"><div class="info"><span>Подсказка:</span><p>Все записи</p></div></span></a>
                <a href="{{route('form-create-guide')}}"><span class="icon create"><div class="info"><span>Подсказка:</span><p>Добавить</p></div></span></a>
                <a href="#" id="btn_search"><span class="icon search"><div class="info"><span>Подсказка:</span><p>Поиск</p></div></span></a>
                <a href="{{route('form-create-social')}}"><span class="icon instagram"><div class="info"><span>Подсказка:</span><p>Соц. сети</p></div></span></a>
            </td>
        </tr>
        <tr>
            <th>Фирма</th>
            <th>ФИО</th>
            <th>Образование</th>
            <th>Телефон</th>
            <th>Почта</th>
            <th>Действие</th>
        </tr>
        @foreach($guides as $guide )
            <tr data-href="{{route('info-guide', $guide->id)}}">
                <td>{{$guide->company_name}}</td>
                <td>{{$guide->fullname}}</td>
                <td>{{$guide->Education}}</td>
                <td>{{$guide->phone}}</td>
                <td><a href="mailto:{{$guide->email}}">{{$guide->email}}</a></td>
                <td>
                    <a href="{{route('edit-guide', $guide->id)}}"><span class="icon edit"><div class="info"><span>Подсказка:</span><p>Редактировать</p></div></span></a>
                    <a href="{{route('delete-guide', $guide->id)}}"><span class="icon delete"><div class="info"><span>Подсказка:</span><p>Удалить</p></div></span></a>
                </td>
            </tr>
        @endforeach
    </table>.
    @else
        <div class="form">
            <p>
                Таблица пуста, создать <a href="{{route('form-create-guide')}}">новую</a> запись?
            </p>
        </div>
    @endif
    <script src="{{asset('js/table-href.js')}}"></script>
    @isset($searcher)
        @include('layouts.form-search', ['action' => $searcher->action, 'columns' => $searcher->columns])
    @endisset
@endsection