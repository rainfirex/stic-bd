@extends('layouts.admin.app')
@section('content')
    <div class="command-panel">
        <a href="{{route('form-reset-password', $user->id)}}" class="btn btn-info">Обновить пароль</a>
        <a href="{{route('delete-user', $user->id)}}" class="btn btn-danger">Удалить пользователя</a>
    </div>
    <div class="form">
        <form action="{{route('update-user')}}" method="POST">
            @csrf
            {{ method_field('PUT') }}
            <input type="hidden" name="id" value="{{$user->id}}">
            <div class="row">
                <div class="col-md-5">
                    <label>Имя</label>
                </div>
                <div class="col-md-7">
                    <input class="form-control" id="name" type="text" name="name" value="{{ old('name') ? old('name') : $user->name}}" required autofocus>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <label>Почта</label>
                </div>
                <div class="col-md-7">
                    <input class="form-control" id="email" type="email" name="email" value="{{ old('email') ? old('email') : $user->email }}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <label>Роли</label>
                </div>
                <div class="col-md-7">
                    <select class="form-control" name="roles_id">
                        @foreach($roles as $role)
                            @if($user->roles_id === $role->id)
                                <option value="{{$role->id}}" selected>{{$role->name}}</option>
                            @else
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label>
                        @if($user->is_enable)
                            <input type="checkbox" name="is_enable" checked>Включить
                        @else
                            <input type="checkbox" name="is_enable">Включить
                        @endif
                    </label>
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
    Редактировать пользователя
@endsection