@extends('layouts.admin.app')
@section('content')
    <div class="form">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-5">
                    <label>Имя</label>
                </div>
                <div class="col-md-7">
                    <input class="form-control" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <label>Почта</label>
                </div>
                <div class="col-md-7">
                    <input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <label>Роли</label>
                </div>
                <div class="col-md-7">
                    <select class="form-control" name="roles_id">
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <label>Пароль</label>
                </div>
                <div class="col-md-7">
                    <input class="form-control" id="password" type="password" name="password" minlength="8" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <label>Подтверждение пароля</label>
                </div>
                <div class="col-md-7">
                    <input class="form-control" id="password-confirm" type="password" name="password_confirmation" minlength="8" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label><input type="checkbox" name="is_enable">Включить</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 center">
                    <input type="submit" value="Создать" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
@endsection
@section('title')
    Создание пользователя
@endsection