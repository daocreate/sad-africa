<?php
/**
 * Created by PhpStorm.
 * User: KEUDEM
 * Date: 19/09/2019
 * Time: 10:15
 */?>
@extends('backend.layout')

@section('main')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show formation</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('formations.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Code:</strong>
                {{ $formation->code }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Length:</strong>
                {{ $formation->length }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Label:</strong>
                {{ $formation->label }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $formation->description }}
            </div>
        </div>
    </div>
    @endsectio
