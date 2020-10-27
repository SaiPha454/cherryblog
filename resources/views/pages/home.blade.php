@extends('layouts.app')

@section('content')
<div class="fluid-container">
    <div>
        <img src="/storage/appImages/homeCover.png" alt="">
    </div>

    <div style="margin-top: 35px" class="">
        <div class="container">
            @foreach ($posts as $post)
                <div style="padding: 15px;margin-bottom:10px" class="card">
                    <div style="text-align:right;">
                        <label > Date : {{$post->uplodedTime}} </label>
                    </div>
                      
                    <div style="margin-top: 5px;overflow:hidden;position:relative" class="row">
                        <div class="col-3">
                            <img src={{$post->image}}
                            style="width: 100%" class="img-fluid" alt="">
                        </div>

                        <div class="col-9">
                            <div>
                                <label style="font-family: 'Tienne', serif;color:#000000;font-size:20px;" > 
                                    {{$post->title}} </label>
                            </div>
                            <div style="padding-bottom:50px">
                                <p style="font-size: 16px;display:-webkit-box;
                                -webkit-box-orient:vertical;-webkit-line-clamp: 3; overflow: hidden;"> {{$post->body}} </p>
                            </div>

                            <div style="position: absolute;bottom:0px;text-align:right;width:90%;padding-top:50px">

                                @if (Auth::check() and Auth::id()==$post->writer_id)
                                    <a class="btn btn-primary" href="/blog/{{$post->id}}/edit" style="margin-right: 15px;float:left">Edit</a> 
                                    
                                    <div style="display: inline-block;float:left">
                                        {!! Form::open(['method' => 'POST', 'action' => ['App\Http\Controllers\PostsController@destroy',$post->id],'class'=>'pull-right']) !!}
                                        {!! Form::hidden('_method', 'DELETE') !!}
                                        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                                        {!! Form::close() !!}
                                    </div>
                                @endif
                               


                               <i style="margin-right: 15px">Written By : {{$post->writter}}</i>
                                <a href="/blog/{{$post->id}}" class="btn btn-primary">Read more </a>
                            </div>
                        </div>

                    </div>
                        
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
