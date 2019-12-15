@extends("backend.layouts.base1")
@section('title', 'Sign Up')
@section("content")
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="{{route('home')}}" title="{{__('home')}}">
                                <img src="{{ asset("frontEnd/img/logo.png") }}" alt="SAID Africa" style="height: 96px; width: 140px">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action=" {{ route('tSingup') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    {{--<label>{{__('email')}}</label>--}}
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                                </div>
                                @if($errors->has('email'))
                                    <div class="alert alert-warning">
                                        <p>{{ $errors->first('email') }}</p>
                                    </div>
                                @endif
                                @if(Session::has('exist_email'))
                                    <div class="alert alert-warning">
                                        <p> {{ Session::get('exist_email') }} </p>
                                    </div>
                                @endif
                                <div class="form-group">
                                    {{--<label>Nom*</label>--}}
                                    <input class="au-input au-input--full" type="text" name="nom" placeholder="Nom" value="{{ old('nom') }}">
                                </div>
                                @if($errors->has('nom'))
                                    <div class="alert alert-warning">
                                        <p>{{ $errors->first('nom') }}</p>
                                    </div>
                                @endif
                                <div class="form-group">
                                    {{--<label>{{__('password')}}</label>--}}
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password" {{ old('password') }}>
                                </div>
                                @if($errors->has('password'))
                                    <div class="alert alert-warning">
                                        <p>{{ $errors->first('password') }}</p>
                                    </div>
                                @endif
                                <div class="form-group">
                                    {{--<label>{{__('password')}} {{__('confirm')}}</label>--}}
                                    <input class="au-input au-input--full" type="password" name="password_confirmation" placeholder=" Confirm Password">
                                </div>
                                @if($errors->has('password_confirmation'))
                                    <div class="alert alert-warning">
                                        <p>{{ $errors->first('password_confirmation') }}</p>
                                    </div>
                                @endif
                                {{-- for add image profile --}}
                                <div class="form-group row">
                                    <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Avatar (optional)') }}</label>

                                    <div class="col-md-6">
                                        <input id="avatar" type="file" class="form-control" name="avatar" {{ old('avatar') }}>
                                    </div>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">{{__('register')}}</button>

                                {{--<div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">sign in with facebook</button>
                                    </div>
                                </div>--}}
                            </form>
                            <div class="register-link">
                                <p>
                                    {{__('you_have_account')}}
                                    <a href="{{ route("login") }}">{{__('login')}} {{__('here')}}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
