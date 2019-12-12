<?php
/**
 * Created by PhpStorm.
 * User: KEUDEM
 * Date: 19/09/2019
 * Time: 09:47
 */
?>
@extends('backend.layout')

@section('main')
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-5">
                <div class="col-lg-12 margin-tb">
                    <div class=" float-left ">
                        <a class="btn btn-primary" href="{{ route('formations.index') }}"> <i class="fa fa-list"></i> </a>
                    </div>
                    <div class="pull-left ml-md-5">
                        <h2>{{__('add')}} {{__('new')}} {{__('formation')}}</h2>
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

        <form action="{{ route('formations.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <select class="form-control category" name="category_id" value="{{ old('category_id') }}">
                            <option value="">{{ __('select_category')}}</option>
                        @foreach($categories as $category)
                            @if($category->state == 1)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>@endif
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <select class="form-control former" name="former_id" value="{{ old('former_id') }}">
                            <option value="">{{ __('select_former')}}</option>
                            @foreach($formers as $former)
                                @if($former->state == 1)
                                    <option value="{{ $former->id }}">{{ $former->name }}</option>@endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-group">
                        <strong>Code:</strong>
                        <input type="text" name="code" class="form-control" placeholder="code" value="{{ old('code') }}">
                    </div>
                </div>

                <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-group">
                        <strong>Label:</strong>
                        <input type="text" class="form-control"  name="label" placeholder="label" value="{{ old('label') }}">
                    </div>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-group">
                        <strong>Length:</strong>
                        <input type="number" name="length" class="form-control" placeholder="length" value="{{ old('length') }}">
                    </div>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-group">
                        <strong>@lang('dao_custum.description') :</strong>
                        <input type="text" name="description" class="form-control" placeholder="description" value="{{ old('description') }}">
                    </div>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-group">
                        <input type="number" id="user_id" name="user_id" class="form-control" placeholder="user_id" value="{{ auth()->user()->id }}" hidden="true">
                    </div>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8">
                    <input type="file" name="image" id="inputGroupFile04" value="{{ old('image') }}">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-success">{{__('submit')}}</button>
                </div>
            </div>
        </form>
        </div>
    </section>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.category').select2();
        });
        $(document).ready(function() {
            $('.former').select2();
        });
    </script>
@endsection