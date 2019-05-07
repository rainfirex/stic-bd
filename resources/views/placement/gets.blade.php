@extends('layouts.user.app')
@section('content')
    @include('layouts.errors')
    @if(count($placements) > 0)
        <div class="table-responsive">
        <table id="table" class="table">
            <tr>
                <td colspan="10" class="table-header">
                    <span class="title">Гостиницы, Хостелы, Базы отдыха</span>
                    <a href="{{route('placements')}}"><span class="icon refresh"><div class="info"><span>Подсказка:</span><p>Все записи</p></div></span></a>
                    <a href="{{route('form-create-placement')}}"><span class="icon create"><div class="info"><span>Подсказка:</span><p>Новая запись</p></div></span></a>
                    <a href="#" id="btn_search"><span class="icon search"><div class="info"><span>Подсказка:</span><p>Поиск</p></div></span></a>
                    <a href="{{route('form-create-type')}}"><span class="icon type"><div class="info"><span>Подсказка:</span><p>Виды размещения</p></div></span></a>
                    <a href="{{route('form-create-social')}}"><span class="icon instagram"><div class="info"><span>Подсказка:</span><p>Соц. сети</p></div></span></a>
                </td>
            </tr>
            <tr>
                <th>Наименование</th>
                <th>Вид</th>
                <th>Звезд</th>
                <th>Адрес</th>
                <th>Контактное лицо</th>
                <th>Телефон</th>
                <th>Почта</th>
                <th>Соц. сети</th>
                <th>Cайт</th>
                <th>Действие</th>
            </tr>
            @foreach($placements as $placement )
                <tr data-href="{{route('info-placement', $placement->id)}}">
                    <td>{{$placement->title}}</td>
                    @isset($placement->typePlacement->title)
                        <td>{{$placement->typePlacement->title}}</td>
                    @else
                        <td>null</td>
                    @endisset
                    <td>{{$placement->number_of_stars}}</td>
                    <td>{{$placement->address}}</td>
                    <td>{{$placement->contact_name}}</td>
                    <td>{{$placement->phone}}</td>
                    <td><a href="mailto:{{$placement->email}}">{{$placement->email}}</a></td>
                    @if($placement->social_entities_id > 0)
                        {{--<td><a href="{{route('show-social', $placement->socialEntity->id)}}">{{$placement->socialEntity->title}}</a></td>--}}
                        <td>{{$placement->socialEntity->title}}</td>
                    @else
                        <td>Нет группы</td>
                    @endif
                    <td><a href="{{$placement->url_site}}" target="_blank">{{$placement->url_site}}</a></td>
                    <td>
                        <a href="{{route('edit-placement', $placement->id)}}"><span class="icon edit"><div class="info"><span>Подсказка:</span><p>Редактировать</p></div></span></a>
                        <a href="{{route('delete-placement', $placement->id)}}"><span class="icon delete"><div class="info"><span>Подсказка:</span><p>Удалить</p></div></span></a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    @else
        <div class="form">
            <p>
                Таблица пуста, создать <a href="{{route('form-create-placement')}}">новую</a> запись?
            </p>
        </div>
    @endif
    <script src="{{asset('js/table-href.js')}}"></script>
    @isset($searcher)
        @include('layouts.form-search', ['action' => $searcher->action, 'columns' => $searcher->columns])
    @endisset
@endsection