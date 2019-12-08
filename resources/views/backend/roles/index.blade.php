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
                        <a class="btn btn-info" href="{{ route('roles.show',$role->id) }} " title="{{ __('show') }}"><i class="fa fa-eye"></i> </a>
                        @can('role-edit')
                            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}" title="{{ __('edit') }}"><i class="fa fa-edit"></i> </a>
                        @endcan
                        @can('role-delete')
                            <div class="btn-group">
                                <form  class="myAction" method="POST" action="{{URL::route('roles.destroy', $role->id)}}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn btn-danger " title="{{ __('delete') }}">
                                        <i class="fa fa-fw fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
