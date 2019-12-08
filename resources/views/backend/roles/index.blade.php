<?php
/**
 * Created by PhpStorm.
 * User: KEUDEM
 * Date: 23/09/2019
 * Time: 20:43
 */?>
@extends('backend.layout')

@section('main')
    <div class="row mb-3">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                @can('role-create')
                    <a class="btn btn-success" href="{{ route('roles.create') }}"> {{ __('create_role') }}</a>
                @endcan

            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-striped table-bordered table-hover" id="myTab">
        <thead>
            <tr>
                <th>{{__('name')}}</th>
                <th width="280px">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($roles as $key => $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">{{ __('show') }}</a>
                        @can('role-edit')
                            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">{{ __('edit') }}</a>
                        @endcan
                        @can('role-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}

                            {!! Form::submit(_('delete'), ['class' => 'btn btn-danger']) !!}

                            {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
