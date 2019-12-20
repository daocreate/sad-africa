<?php
/**
 * Created by PhpStorm.
 * User: KEUDEM
 * Date: 19/09/2019
 * Time: 09:56
 */?>
@extends('backend.layout')

@section('main')
    <div class="row">
        <div class="row col-lg-12 margin-tb">
            <div class="col-lg-4">
                <a class="btn btn-primary" href="{{ route('formations.index') }}"> {{__('back')}}</a>
            </div>
            <div class="col-lg-6">
                <h2>{{__('edit')}} {{__('formation')}}</h2>
            </div>

        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> {{__('some_problems_input.')}}<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('formations.update',$formation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <select class="form-control category" name="category_id" value="{{ $formation->category_id }}">
                        <option value="{{$formation->category_id}}">{{$formation->category->name }}</option>
                        @foreach($categories as $category)
                            @if($category->state == 1)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>@endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <select class="form-control former" name="former_id" value="{{ $formation->former->name}}">
                        <option value="{{ $formation->former_id}}">{{ $formation->former->name}}</option>
                        @foreach($formers as $former)
                            @if($former->state == 1)
                                <option value="{{ $former->id }}">{{ $former->name }}</option>@endif
                        @endforeach
                    </select>
                </div>
            </div>

        </div>
        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="form-group">
                <strong>{{__('code')}}:</strong>
                <input type="text" name="code" class="form-control" placeholder="code" value="{{ $formation->code }}">
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="form-group">
                <strong>{{__('label')}}:</strong>
                <input type="text" name="label" class="form-control" placeholder="label" value="{{ $formation->label }}">
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="form-group">
                <strong>{{__('length')}}:</strong>
                <input type="number" name="length" class="form-control" placeholder="label" value="{{ $formation->length }}">
            </div>
        </div>

        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="form-group">
                <strong>{{__('state')}}:</strong>
                <input type="number" name="state" class="form-control" placeholder="state" value="{{ $formation->state }}">
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="form-group">
                <strong>{{__('description')}}:</strong>
                <input type="text" name="description" class="form-control" placeholder="description" value="{{ $formation->description }}">
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="form-group">
                <strong>{{__('image')}}:</strong>
                <input type="file" name="image" id="inputGroupFile04" value="{{ $formation->getFirstMediaUrl('formation') }}">
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8 text-center">
            <button type="submit" class="btn btn-outline-success">{{__('update')}}</button>
        </div>

    </form>

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