@extends('layouts.app')
@section('content')
<h3 class="title-page">Новая запись "Social"</h3>
@if($errors->any())
    @include('layouts.errors')
@endif
<form action="{{route('create-entity')}}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="fields">
        <label>Наименование</label>
        <input type="text" name="title" placeholder="Наименование">
    </div>
    <div class="fields">
        <input type="submit" value="Создать">
    </div>
</form>
@endsection