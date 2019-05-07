@extends('layouts.user.app')
@section('content')
<div class="container">
    <div class="form center">
        <form method="POST" action="{{ route('login') }}">
            <div class="head">
                <span class="title">{{ __('Login') }}</span>
            </div>
            <div class="body">
                @if ($errors->has('email'))
                    <div class="row">
                        <div class="col-md-12">
                            <span role="alert"><strong>{{ $errors->first('email') }}</strong></span>
                        </div>
                    </div>
                @endif
                @if ($errors->has('password'))
                    <div class="row">
                        <div class="col-md-12">
                            <span role="alert"><strong>{{ $errors->first('password') }}</strong></span>
                        </div>
                    </div>
                @endif
                @csrf
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label offset-1">{{ __('E-Mail Address') }}</label>
                    <div class="col-md-6 offset-1">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                               name="email" value="{{ old('email') }}" required autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label offset-1">{{ __('Password') }}</label>
                    <div class="col-md-6 offset-1">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label class="form-check-label" for="remember">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Запомни меня') }}
                        </label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">{{ __('Войти') }}</button>
                        <div>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Забыли пароль?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
