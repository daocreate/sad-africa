<?php
/**
 * Created by PhpStorm.
 * User: KEUDEM
 * Date: 23/09/2019
 * Time: 21:08
 */?>
@extends('backend.layout')
@section('main')
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Users Management</h2>
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>{{__('state')}}</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($data as $key => $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            <!-- todo: have problem in mobile device -->
                            <input class="statusChange" type="checkbox" data-pk="{{$user->id}}" @if($user->state) checked @endif data-toggle="toggle" data-on="<i class='fa fa-check-circle'></i>" data-off="<i class='fa fa-ban'></i>" data-onstyle="success" data-offstyle="danger">
                            <input data-id="{{$user->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $user->state ? 'checked' : '' }} >
                        </td>
                        <td>
                            <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">{{ __('show') }}</a>
                            @hasrole('admin')
                                <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">{{ __('edit') }}</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                {!! Form::submit(__('delete') , ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            @endhasrole
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready( function () {
            $('#myTab').DataTable()
        });
    </script>
@endsection

