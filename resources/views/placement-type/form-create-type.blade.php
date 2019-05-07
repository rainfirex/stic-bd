@extends('layouts.user.app')
@section('content')
    @include('layouts.errors')
    <div class="form center">
        <form action="{{route('create-type')}}" method="post">
            <div class="head">
                <span class="title">Создать тип для "Гостиницы, Хостелы, Базы отдыха"</span>
                <a href="{{route('placements')}}"><span class="icon back"><div class="info"><span>Подсказка:</span><p>Все записи</p></div></span></a>
            </div>
            <div class="body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="fields">
                    <label>Наименование</label>
                    <input type="text" name="title" placeholder="Наименование типа">
                </div>

                <div class="fields">
                    <input type="submit" value="Создать">
                </div>
            </div>
        </form>
    </div>
    @if(count($types) > 0)
    <br>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>Наименование</th>
                <th width="100">Действие</th>
            </tr>
            @foreach($types as $type )
                <tr>
                    <td>{{$type->title}}</td>
                    <td>
                        <a href="{{route('delete-type', $type->id)}}"><span class="icon delete"><div class="info"><span>Подсказка:</span><p>Удалить</p></div></span></a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    @endif
@endsection