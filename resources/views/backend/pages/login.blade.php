@extends("backend.layouts.base1")
@section('title', 'Login')
@section("content")
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="{{ asset("frontEnd/img/logo.png") }}" alt="LearnIT">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="{{ route("tLogin") }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" required type="email" name="email" placeholder="Email" value="{{ old('email') }}" >
                                </div>
                                @if($errors->has('email'))
                                    <div class="alert alert-warning">
                                        <p>{{ $errors->first('email') }}</p>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" required type="password" name="password" placeholder="Password">
                                </div>
                                @if($errors->has('password'))
                                    <div class="alert alert-warning">
                                        <p>{{ $errors->first('password') }}</p>
                                    </div>
                                @endif
                                <button class=" main_btn" type="submit">{{__('login')}}</button>
                                {{--<div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">sign in with facebook</button>
                                        <button class="au-btn au-btn--block au-btn--blue2">sign in with twitter</button>
                                    </div>
                                </div>--}}
                            </form>
                            <div class="register-link">
                                <p>
                                    Vous n'avez pas encore de compte?
                                    <a href="{{ route("singup") }}">Créez en Ici</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
