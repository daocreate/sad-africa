
@extends("frontend.layouts.frontEndBase1")
@section('title', 'Update Profile')
@section('content')
<div class="container">
    <div class="row">
        <div class="container">
            <br/>
        <div class="col-md-10 col-md-offset-1">
            <h2>{{ $user->name }}'s Profile</h2>

            <br/>
            <form  action="{{ route('avatar.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group">
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="form-group">
                            <strong>{{__('name')}} : </strong>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="form-group">
                            <strong>{{__('global.phone')}} : </strong>
                            {!! Form::number('phone_number', null, array('placeholder' => 'Phone Number','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="row form-group has-feedback">
                            <label for="gender">&nbsp;&nbsp;&nbsp;&nbsp;<strong>{{__('gender')}} : &nbsp;&nbsp;</strong>
                            </label>
                            {!! Form::select('gender', AppHelper::GENDER, $gender , ['class' => 'form-control gender', 'required' => 'true']) !!}
                            <span class="form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="form-group">
                            <strong>{{__('dao_custom.birth_date')}} : </strong>
                            {!! Form::date('birth_date', null, array('placeholder' => 'Birth Date','class' => 'form-control')) !!}
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
        </div>
    </div>
    <br>
    <div class="card-columns">
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
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.gender').select2();
        });
    </script>
@endsection