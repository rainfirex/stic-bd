@extends('layouts.user.app')
@section('content')
    @include('layouts.errors')
    @if(count($loyalSponsors) > 0)
        <div class="table-responsive">
        <table id="table">
            <tr>
                <td colspan="7" class="table-header">
                    <span class="title">Лояльные спонсоры</span>
                    <a href="{{route('loyal-sponsors')}}"><span class="icon refresh"><div class="info"><span>Подсказка:</span><p>Все записи</p></div></span></a>
                    <a href="{{route('form-create-loyal-sponsor')}}"><span class="icon create"><div class="info"><span>Подсказка:</span><p>Добавить</p></div></span></a>
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
            @foreach($loyalSponsors as $loyalSponsor )
                <tr data-href="{{route('info-loyal-sponsor', $loyalSponsor->id)}}">
                    <td>{{$loyalSponsor->title}}</td>
                    <td>{{$loyalSponsor->contact_name}}</td>
                    <td>{{$loyalSponsor->phone}}</td>
                    <td><a href="mailto:{{$loyalSponsor->email}}">{{$loyalSponsor->email}}</a></td>
                    @if($loyalSponsor->social_entities_id > 0)
                        {{--<td><a href="{{$loyalSponsor->socialEntity->id}}">{{$loyalSponsor->socialEntity->title}}</a></td>--}}
                        <td>{{$loyalSponsor->socialEntity->title}}</td>
                    @else
                        <td>Нет группы</td>
                    @endif
                    <td><a href="{{$loyalSponsor->url_site}}" target="_blank">{{$loyalSponsor->url_site}}</a></td>
                    <td>
                        <a href="{{route('edit-loyal-sponsor', $loyalSponsor->id)}}"><span class="icon edit"><div class="info"><span>Подсказка:</span><p>Редактировать</p></div></span></a>
                        <a href="{{route('delete-loyal-sponsor', $loyalSponsor->id)}}"><span class="icon delete"><div class="info"><span>Подсказка:</span><p>Удалить</p></div></span></a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    @else
        <div class="form">
            <p>
                Таблица пуста, создать <a href="{{route('form-create-loyal-sponsor')}}">новую</a> запись?
            </p>
        </div>
    @endif
    <script src="{{asset('js/table-href.js')}}"></script>
    @isset($searcher)
        @include('layouts.form-search', ['action' => $searcher->action, 'columns' => $searcher->columns])
    @endisset
@endsection