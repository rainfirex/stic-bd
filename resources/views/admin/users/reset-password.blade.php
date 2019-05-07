@extends('layouts.admin.app')
@section('content')
        <div class="form">
            <form action="{{route('reset-password')}}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                <input type="hidden" name="id" value="{{$user->id}}">
                <div class="row">
                    <div class="col-md-5">
                        <label>Имя</label>
                    </div>
                    <div class="col-md-7">
                        <input class="form-control" id="name" type="text" name="name" value="{{$user->name}}" required readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <label>Пароль</label>
                    </div>
                    <div class="col-md-7">
                        <input class="form-control" id="password" type="password" name="password" minlength="8" required autofocus>
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
                    <div class="col-md-12 center">
                        <input type="submit" value="Установить" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
@endsection
@section('title')
    Редактировать пользователя
@endsection