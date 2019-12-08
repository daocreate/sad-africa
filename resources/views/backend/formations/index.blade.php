<?php
/**
* Created by PhpStorm.
* User: KEUDEM
* Date: 19/09/2019
* Time: 05:46
*/
?>

@extends('BackEnd.layouts.base')

@section('content')
    <div class="row mb-5">
        <div class="row col-lg-12 margin-tb">
            <div class="col-lg-4">
                <a class="btn btn-success" href="{{ route('formations.create') }}"><i class="fa fa-plus"></i></a>
            </div>
            <div class="col-lg-6">
                <h2>formations</h2>
            </div>

        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class=" table table-striped table-bordered table-hover" id="myTab">
        <thead>
            <tr>
                <th>{{__('code')}}</th>
                <th>{{__('label')}}</th>
                <th>{{__('length')}}</th>
                <th>{{__('description')}}</th>
                <th>{{__('state')}}</th>
                <th>{{__('Image')}}</th>
                <th width="300px">{{__('action')}}</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($formations as $formation)
            <tr>
                <td>{{ $formation->code }}</td>
                <td>{{ $formation->label }}</td>
                <td>{{ $formation->length }}</td>
                <td>{{ $formation->description }}</td>
                <td>

                    <input class="statusChange" type="checkbox" data-pk="{{$formation->id}}" @if($formation->state) checked @endif data-toggle="toggle" data-on="<i class='fa fa-check-circle'></i>" data-off="<i class='fa fa-ban'></i>" data-onstyle="success" data-offstyle="danger">
                </td>
                <td>
                    <div class="card card-img" style="width: 5rem; height: 3rem;">
                        <img src="{{$formation->getFirstMediaUrl('formation') }}"  style="width: 5rem; height: 3rem;"/>
                    </div>
                </td>

                <td>
                    <form action="{{ route('formations.destroy',$formation->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('formations.show',$formation->id) }}">{{ __('show') }}</a>
                        @can('formation-edit')
                            <a class="btn btn-primary" href="{{ route('formations.edit',$formation->id) }}">{{ __('edit') }}</a>
                        @endcan

                        @can('formation-delete')
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{ __('delete') }}</button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tr>
            <th>{{__('code')}}</th>
            <th>{{__('label')}}</th>
            <th>{{__('length')}}</th>
            <th>{{__('description')}}</th>
            <th>{{__('state')}}</th>
            <th>{{__('Image')}}</th>
            <th width="300px">{{__('action')}}</th>
        </tr>
    </table>
{{--
    {!! $formations->appends(['s' => $s])->links() !!}
--}}
@endsection
