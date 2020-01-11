
@extends("frontend.layouts.frontEndBase1")
@section('title', 'Update Profile')
@section('content')
<div class="container">
    <div class="row mb-5">
        <div class="container col-md-12 row">
            <br/>
        <div class="col-md-8 col-md-offset-1">
            <h2>Email: {{ $user->email }} </h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> {{__('some_problem_with_input')}}.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <br/>
            <form  action="{{ route('avatar.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group">
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="form-group">
                            <strong>{{__('name')}} : </strong>
                            {!! Form::text('name', $user->name, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="form-group">
                            <strong>{{__('birth_place')}} : </strong>
                            {!! Form::text('birth_place', $user->birth_place, array('placeholder' => 'Birth Place','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="form-group">
                            <strong>{{__('global.phone')}} : </strong>
                            {!! Form::number('phone_number', $user->phone_number, array('placeholder' => 'Phone Number','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="row form-group has-feedback">
                            <label for="gender">&nbsp;&nbsp;&nbsp;&nbsp;<strong>{{__('gender')}} : &nbsp;&nbsp;</strong>
                            </label>
                            {!! Form::select('gender', AppHelper::GENDER, $user->gender , ['class' => "form-control gender"]) !!}
                            <span class="form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="form-group">
                            <strong>{{__('dao_custom.birth_date')}} : </strong>
                            {!! Form::date('birth_date', $user->birth_date, array('placeholder' => 'Birth Date','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="custom-file">
                            <input type="file" name="avatar" class="custom-file-input" id="inputGroupFile04" >
                            <label class="custom-file-label" for="inputGroupFile04">{{__('choose_file')}}</label>
                        </div>
                    </div>

                    <div class="input-group-append">
                        <input class="btn btn-success" type="submit" id="inputGroupFileAddon04" value="{{__('update')}}"  />
                    </div>
                </div>
            </form>
        </div>
        <div class="card-columns col-xs-3 col-sm-3 col-md-3">
            @foreach($avatars as $avatar)
                <div class="card" style="width: 13rem;">
                    <img src="{{$avatar->getUrl()}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->email }}</h5>
                        <a href="#" class="text-danger align-content-center"><i class="fa fa-minus-circle fa-3x"></i></a>
                    </div>
                </div>
            @endforeach

        </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.gender').select2();
        });
    </script>
@endsection