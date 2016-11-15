@extends('layouts.auth')
@section('content')

<div class="login_wrapper">
    <div class="animate form login_form">
        <section class="login_content">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <h1>Login</h1>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus />
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group checkbox">
                    <label class="pull-left">
                        <input type="checkbox" name="remember"> Remember me
                    </label>
                </div>

                <br/>
                {!! Geetest::render() !!}
                <div>
                    <button type="submit" class="btn btn-primary submit">Log in</button>
                    <a class="reset_pass" href="{{ url('/password/reset') }}">Lost your password?</a>
                </div>

                <div class="clearfix"></div>

                <div class="form-group separator">
                    <p class="change_link">New to site?
                        <a href="{{ url('/register') }}" class="to_register"> Create Account </a>
                    </p>

                    <div class="clearfix"></div>
                    <br />

                    <div>
                        <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                        <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>
@endsection
