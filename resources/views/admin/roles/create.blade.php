@extends('layouts.admin.app')
@section('content')
    <div id="form-container" class="form-container hidden">
        <div class="form">
            <button class="btn btn-danger btn-form-close" id="btn_hide_frm">x</button>
            <form action="{{route('create-role')}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-5">
                        <label>Наименование</label>
                    </div>
                    <div class="col-md-7">
                        <input class="form-control" type="text" name="name" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <label>Описание</label>
                    </div>
                    <div class="col-md-7">
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <fieldset>
                            <legend>Доступ</legend>
                            <label><input type="checkbox" name="is_read">Просматривать</label>
                            <label><input type="checkbox" name="is_edit">Редактировать</label>
                            <label><input type="checkbox" name="is_delete">Удалять</label>
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 center">
                        <input class="btn btn-primary" type="submit" value="Создать">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('title')
    Создание роли
@endsection