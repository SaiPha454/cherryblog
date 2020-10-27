{{-- Page that will show For creating the post --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Form::open(['method' => 'POST', 'action' => 'App\Http\Controllers\PostsController@store', 'class' => 'form-horizontal','files'=>true]) !!}
           
            <div style="width: 50%;margin-top:20px" class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }} mx-auto">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('inputname') }}</small>
            </div>

            <div style="width: 50%" class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }} mx-auto">
                {!! Form::label('body', 'Body') !!}
                {!! Form::textarea('body', null, ['class' => 'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('inputname') }}</small>
            </div>

            <div style="width: 50%" class="form-group{{ $errors->has('photo') ? ' has-error' : '' }} mx-auto">
                {!! Form::label('photo', 'Image') !!}
                {!! Form::file('photo') !!}
                <small class="text-danger">{{ $errors->first('photo') }}</small>
            </div>

            <div style="width: 50%;text-align:right" class="form-group mx-auto">
                {!! Form::submit('Upload', ['class' => 'btn btn-info pull-right']) !!}
            </div>
            
            
        {!! Form::close() !!}
    </div>
@endsection