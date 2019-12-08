@extends('backend.layout')

@section('main')
    <div class="content">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
            @if ($message = Session::get('delete'))
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @hasanyrole('admin|manager')
                <a href="{{route('events.create')}}" class="btn btn-outline-primary mb-3"><i class="fa fa-calendar-plus"></i></a>
            @endhasanyrole
        <div class="row col-md-12">
            <div class="col-md-8 ">
                <table class="table table-striped table-bordered table-hover rounded" id="myTab">
                    <thead>
                        <tr>
                            <th>{{__('title')}}</th>
                            <th>{{__('color')}}</th>
                            <th>{{__('start')}} {{__('date')}}</th>
                            <th>{{__('end')}} {{__('date')}}</th>
                            <th  >{{__('update')}}/{{__('edit')}}</th>
                            <th width="70px">{{__('delete')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($events as $key => $event)
                        <tr class="">
                            <td>{{ $event->title }}</td>
                            <td><input type="color" value="{{ $event->color }}"/></td>
                            <td>{{ $event->start_date }}</td>
                            <td>{{ $event->end_date }}</td>
                            <td>
                                <a href="{{route('events.show', $event->id)}}" class="btn btn-info" title="{{__('show')}}"><i class="fa fa-eye"></i> </a>
                                <a href="{{route('events.edit', $event->id)}}" class="btn btn-primary" title="{{__('edit')}}"><i class="fa fa-edit"></i> </a>
                            </td>
                            <td>
                                <form method="POST" action="{{action('BackEnd\EventController@destroy', $event->id)}}" >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger " title="{{__('delete')}}"><i class="fa fa-trash"></i> </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
            <div class="main_title col-md-4">
                <div class="container card card-outline-tabs">
                    <h2>{{__('events')}}</h2>
                    {{--<div class="jumbotron">--}}
                        <div class="row">
                            <div class="col-md-offset-2">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        {!! $calendar->calendar() !!}
                                        {!! $calendar->script() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{--</div>--}}
                </div>
            </div>
        </div>

    </div>

@endsection
