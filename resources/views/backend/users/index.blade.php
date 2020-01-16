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
                        @can('user-create')
                            <a class="btn btn-success" href="{{ route('users.create') }}">{{__('new')}}</a>
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Birth Place</th>
                        <th>Birth Date</th>
                        <th>{{__('phone')}}</th>
                        <th>{{__('gender')}}</th>
                        <th>Roles</th>
                        <th>{{__('state')}}</th>
                        <th >{{__('global.create')}}</th>
                        <th width="200px">Action</th>

                    </tr>
                </thead>
                <tbody>
                @foreach ($data as $key => $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->birth_place }}</td>
                        <td>{{ $user->birth_date }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>{{ $user->gender }}</td>

                        <td>
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            {{--<input data-id="{{$user->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $user->state ? 'checked' : '' }}>--}}
                            <!-- todo: have problem in mobile device -->
                                <input class="statusChange" id="statusChange" type="checkbox" data-pk="{{$user->id}}" @if($user->state) checked @endif data-toggle="toggle" data-on="<i class='fa fa-check-circle'></i>" data-off="<i class='fa fa-ban'></i>" data-onstyle="success" data-offstyle="danger">
                        </td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('users.show',$user->id) }}" title="{{ __('show') }}"><i class="fa fa-eye"></i> </a>
                            @hasrole('admin')
                                <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}"  title="{{ __('edit') }}"><i class="fa fa-edit"></i></a>
                            <div class="btn-group">
                                <form  class="myAction" method="POST" action="{{URL::route('users.destroy', $user->id)}}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn btn-danger " title="{{ __('delete') }}">
                                        <i class="fa fa-fw fa-trash"></i>
                                    </button>
                                </form>
                            </div>
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
        $(function() {
            $('#statusChange').change(function() {
                var state = $(this).prop('checked') == true ? 1 : 0;
                var user_id = $(this).data('id');
                alert(state);

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/users.changeStatus',
                    data: {'state': state, 'user_id': user_id},
                    success: function(data){
                        console.log(data.success);
                        toastr.options.closeButton = true;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.success(data.message);
                    }
                });
            })
        })
    </script>
    <script>
        $(document).ready( function () {
            $('#myTab').DataTable()
        });
    </script>

@endsection

