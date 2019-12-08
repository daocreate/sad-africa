@extends('backend.layout')

@section('main')
<div class="content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="container row mb-5">
                <div class="row col-lg-12 margin-tb">
                    <div class="col-lg-4">
                        <a class="btn btn-outline-primary" href="{{ route('events.index') }}"><i class="fa fa-list"></i></a>
                    </div>
                    <div class="col-lg-6">
                        <h2>{{__('add')}} {{__('event')}}</h2>
                    </div>

                </div>
            </div>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> {{__('some_problem_with_input')}}<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="panel-body">
                <form method="POST" action="{{action('BackEnd\EventController@store')}}">
                    {{ csrf_field() }}
                    {{--<label for="title">{{__('enter')}} {{__('name')}} {{__('event')}}</label>--}}
                    <input type="text" class="form-control mb-3" name="title" placeholder="{{__('enter')}} {{__('name')}} {{__('event')}}" />
                    <textarea  class="form-control mb-3" rows="5" name="description"  >{{__('enter')}} {{__('description')}} {{__('event')}}...</textarea>
                    <strong><label for="color">{{__('select')}} {{__('color')}} {{__('event')}} :</label></strong> <br />
                    <input type="color" class="mb-3" name="color" placeholder="{{__('enter')}}  {{__('color')}}" />
                    <input type="datetime-local" class="form-control mb-3" name="start_date" placeholder="{{__('enter')}}  {{__('start')}} {{__('date')}}" />
                    <input type="datetime-local" class="form-control mb-3" name="end_date" placeholder="{{__('enter')}}  {{__('end')}} {{__('date')}}" />
                    <input type="submit" class="btn btn-success" name="submit" value="{{__('add')}}  {{__('event')}}"/>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection