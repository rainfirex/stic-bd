@extends('layouts.admin.app')
@section('content')
    <div class="command-panel">
        <button class="btn btn-info" id="btn_show_frm">Создать правило</button>
    </div>
    <div id="form-container" class="form-container hidden">
        <div class="form">
            <div class="right">
                <button class="btn btn-danger btn-form-close" id="btn_hide_frm">x</button>
            </div>
            <form action="{{route('create-access')}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="row">
                    <div class="col-md-5">
                        <label>Разделы</label>
                    </div>
                    <div class="col-md-7">
                        <select class="form-control" name="prefix" required autofocus>
                            <option value="placements">Гостиницы, Хостелы,...</option>
                            <option value="tour-operators">Туроператоры</option>
                            <option value="loyal-sponsors">Лояльные спонсоры</option>
                            <option value="restaurants">Рестораны</option>
                            <option value="guides">Экскурсоводы</option>
                            <option value="social-networks">Социальные сети</option>
                            <option value="social-entities">Группа социальных сетей</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <label>Роли</label>
                    </div>
                    <div class="col-md-7">
                        <select class="form-control" name="roles_id" required>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 center">
                        <input type="submit" value="Добавить" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <ul class="list-group">
        @foreach($access as $key => $value)
            @foreach ($access[$key] as $item)
                <li class="list-group-item"><a href="{{route('delete-access', $item->id)}}">{{$item->prefix}} => {{$item->role->name}} удалить правило</a></li>
            @endforeach
        @endforeach
    </ul>
    <script src={{asset('js/admin/access-show-frm-create.js')}}></script>
@endsection
@section('title')
    Доступы
@endsection