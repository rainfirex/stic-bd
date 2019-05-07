@extends('layouts.user.app')
@section('content')
@include('layouts.errors')
<div class="form center">
    <form action="{{route('create-entity')}}" method="post">
        <div class="head">
            <span class="title">Новая запись "наименование соцеальной сети"</span>
            <a href="{{route('form-create-social')}}"><span class="icon back"><div class="info"><span>Подсказка:</span><p>Все записи</p></div></span></a>
        </div>
        <div class="body">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="fields">
                <label>Наименование</label>
                <input type="text" name="title" placeholder="Наименование">
            </div>
            <div class="fields">
                <input type="submit" value="Создать">
            </div>
        </div>
    </form>
</div>
@if(count($entities) > 0)
    <br>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>Наименование</th>
                <th width="100">Действие</th>
            </tr>
            @foreach($entities as $entity )
                <tr>
                    <td>{{$entity->title}}</td>
                    <td >
                        <a href="{{route('delete-entity', $entity->id)}}"><span class="icon delete"><div class="info"><span>Подсказка:</span><p>Удалить</p></div></span></a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endif
@endsection