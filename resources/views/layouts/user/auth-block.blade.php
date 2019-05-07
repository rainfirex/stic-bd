<div class="auth-block">
    @if(Auth::check())
        @if(Auth::user()->role->isAdmin())
            <span style="float: left;"><a href="{{route('admin')}}">Админка</a></span>
        @endif
            <span>Здравствуйте, {{Auth::user()->name}}</span>
        <form action="{{route('logout')}}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button class="logout">Выход</button>
        </form>
    @else
        <a href="{{route('login')}}">Вход</a>
    @endif
</div>