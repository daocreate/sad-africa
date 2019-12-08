@extends('backend.layout')
@section('main')
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-5">
                <div class="col-lg-12 margin-tb">
                    <div class=" float-left ">
                        <a class="btn btn-primary" href="{{ route('categories.index') }}"> <i class="fa fa-list"></i> </a>
                    </div>
                    <div class="pull-left ml-md-5">
                        <h2>{{__('add')}} {{__('new')}} {{__('category')}}</h2>
                    </div>
                </div>
            </div>
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
            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-group">
                        <strong>{{__('name')}}:</strong>
                        <input type="text" name="name" class="form-control" placeholder="{{__('name')}}">
                    </div>
                    <div class="form-group">
                        <strong>{{__('description')}}:</strong>
                        <textarea  class="form-control mb-3" rows="5" name="description"  >{{__('enter')}} {{__('description')}} {{__('category')}}...</textarea>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-success">{{__('submit')}}</button>
                </div>

            </form>
        </div>
    </section>

@endsection