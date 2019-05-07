<div class="search-frm hidden" id="frm_search">
    <div class="form center">
        <form action="{{$action}}" method="GET">
            <select name="column">
                @foreach($columns as $column)
                    <option value="{{$column['value']}}">{{$column['name']}}</option>
                @endforeach
            </select>
            <br>
            <input type="search" name="text" placeholder="Что ищем?">
            <br>
            <input type="submit" value="Искать">
        </form>
        <script src="{{asset('js/show-frm-search.js')}}"></script>
    </div>
</div>