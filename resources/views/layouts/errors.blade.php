@if($errors->any())
<div class="errors">
    <h3>Ошибка при заполнении формы</h3>
    @foreach($errors->all() as $error)
        <p>{{$error}}</p>
    @endforeach
</div>
@endif