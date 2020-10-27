@extends('layouts.app')

@section('content')
    <div class="container">
        <div style="margin-top: 100px">
            <div style="text-align: center">
                <img style="border-radius: 50%;width:150px;height:150px" id="editProfile_preview"
                src="/storage/profile/{{$user->profileImg}}" alt="">
            </div>
        </div>

        {!! Form::open(['method' => 'POST', 'class' => '','files'=>true,'action'=>'App\Http\Controllers\WritterController@uploadprofile']) !!}
            {!! Form::hidden('_method', 'PUT') !!}
            <div style="text-align: center;margin-top:60px" class="form-group{{ $errors->has('pic') ? ' has-error' : '' }}">
            {!! Form::label('pic', 'Choose Profile Picture') !!}
            {!! Form::file('pic', ['required' => 'required','class'=>'ml-5','onchange'=>'load(this)']) !!}
            <small class="text-danger">{{ $errors->first('pic') }}</small>
            </div>

            {!! Form::submit('Upload', ['class' => 'btn btn-info float-right']) !!}
        {!! Form::close() !!}
    </div>

@endsection

@section('myjs')
   
@endsection