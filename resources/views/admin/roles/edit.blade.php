@extends('layouts.admin.app')
@section('content')
    <div class="command-panel">
        <a href="{{route('delete-role', $role->id)}}" class="btn btn-danger">Удалить роль</a>
    </div>
    <div class="form">
        <form action="{{route('update-role')}}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            {{ method_field('PUT') }}
            <input type="hidden" name="id" value="{{$role->id}}">


            <div class="row">
                <div class="col-md-5">
                    <label>Наименование</label>
                </div>
                <div class="col-md-7">
                    <input class="form-control" type="text" name="name" value="{{$role->name}}" required autofocus>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <label>Описание</label>
                </div>
                <div class="col-md-7">
                    <textarea class="form-control" name="description">{{$role->description}}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <fieldset>
                        <legend>Доступ</legend>
                        <label><input type="checkbox" name="is_read" {{$role->is_read ? 'checked' : ''}}>Просматривать</label>
                        <label><input type="checkbox" name="is_edit" {{$role->is_edit ? 'checked' : ''}}>Редактировать</label>
                        <label><input type="checkbox" name="is_delete" {{$role->is_delete ? 'checked' : ''}}>Удалять</label>
                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 center">
                    <input type="submit" value="Обновить" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
@endsection
@section('title')
    Редактировать роль
@endsection