@extends('layouts.app')

@section('content')
    <div style="margin-top: 50px">
        <div class="container" style="width: 40%">
            {!! Form::open(['method' => 'POST','action'=>'App\Http\Controllers\WritterController@updatename']) !!}
            {!! Form::hidden('_method', 'PUT') !!}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                {!! Form::label('name', 'New Name') !!}
                {!! Form::text('name', $user->name, ['class' => 'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>

                {!! Form::submit('save', ['class' => 'btn btn-info float-right']) !!}
            {!! Form::close() !!}

            {!! Form::open(['method' => 'POST',  'class' => 'mt-5','action'=>'App\Http\Controllers\WritterController@updatemail']) !!}
                {!! Form::hidden('_method', 'PUT') !!}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                {!! Form::label('email', 'New Email') !!}
                {!! Form::email('email', $user->email, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'eg: foo@bar.com']) !!}
                <small class="text-danger">{{ $errors->first('email') }}</small>
                </div>
                {!! Form::submit('save', ['class' => 'btn btn-info float-right']) !!}
            {!! Form::close() !!}


        </div>
    </div>
@endsection