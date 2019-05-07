<header class="center">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">Пользователь: {{Auth::user()->name}}</div>
            <div class="col-md-9 right"><a href="{{route('home')}}" class="btn-exit">домашняя страница</a>&nbsp;|&nbsp;
                <form action="{{route('logout')}}" method="POST" class="logout">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button>выход</button>
                </form>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12 right">
              <p>Admin Console - @yield('title')</p>
          </div>
        </div>
    </div>
</header>