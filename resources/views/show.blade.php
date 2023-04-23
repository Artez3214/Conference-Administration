@extends('layout')
@section('title', 'Registration')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Conference</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('conferences') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Header:</strong>
                {{$conferences->header}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{$conferences->description}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date:</strong>
                {{$conferences->date}}
            </div>
        </div>
    </div>
@endsection
