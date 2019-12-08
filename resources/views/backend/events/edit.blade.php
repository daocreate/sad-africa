@extends('backend.layout')

@section('main')
    <div class="container row mb-5">
        <div class="row col-lg-12 margin-tb">
            <div class="col-lg-4">
                <a class="btn btn-primary" href="{{ route('events.index') }}"><i class="fa fa-list"></i></a>
            </div>
            <div class="col-lg-6">
                <h2>{{__('edit')}} {{__('event')}}</h2>
            </div>

        </div>
    </div>
    {{--display errors input --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="panel-body col-md-8">
        <form method="POST" action="{{route('events.update',$event->id) }}"> {{--action('BackEnd\EventController@update', $id) --}}
            {{ csrf_field() }}
            @method('PUT')

            <input type="text" class="form-control mb-3" name="title" placeholder="{{__('enter')}} {{__('name')}} {{__('event')}}" value="{{$event->title}}"/>
            <strong><label for="color">{{__('select')}} {{__('color')}} {{__('event')}} :</label><br /></strong>
            <input type="color" class=" mb-3" name="color" placeholder="{{__('enter')}}  {{__('color')}}" value="{{$event->color}}"/>
            <input type="datetime-local" class="form-control mb-3" name="start_date" placeholder="{{__('enter')}}  {{__('start')}} {{__('date')}}" value="{{$event->start_date}}"/>
            <input type="datetime-local" class="form-control mb-3" name="end_date" placeholder="{{__('enter')}}  {{__('end')}} {{__('date')}}" value="{{$event->end_date}}"/>
            <input type="submit" class="btn main_btn" name="submit" value="{{__('update')}}  {{__('event')}}"/>
        </form>
    </div>
@endsection