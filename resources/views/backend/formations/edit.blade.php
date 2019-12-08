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
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Code:</strong>
                    <input type="text" name="code" value="{{ $formation->code }}" class="form-control" placeholder="Code">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Label:</strong>
                    <textarea class="form-control" style="height:150px" name="label" placeholder="Detail">{{ $formation->label }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Length:</strong>
                    <textarea class="form-control" style="height:150px" name="length" placeholder="Length">{{ $formation->length }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>State:</strong>
                    <textarea class="form-control" style="height:150px" name="state" placeholder="Detail">{{ $formation->state }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Description">{{ $formation->description }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>

@endsection
