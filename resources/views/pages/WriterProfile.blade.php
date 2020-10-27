@extends('layouts.app')

@section('content')
    
<div class="fluid-container">
    <div class="" 
        style="width: 100%;padding-top:25px;
        padding-bottom:55px">
        
        <div class="d-flex align-items-center ">
            <div style="margin-left: 100px">
                <div style="display: inline-block">
                    <img style="width: 130px;height:130px;border-radius:50%" 
                    src='/storage/profile/{{$user->profileImg}}' alt="">
                </div> 
                
                <div style="display: inline-block;margin-left:50px">
                    <div>
                        <strong > {{$user->name}} </strong>
                    </div>
                    <div>
                        <strong > {{$user->email}} </strong>
                    </div>
                </div>
            </div>
        </div>
        @if (Auth::check() and Auth::id()==$user->id )
        <div style="margin-left: 290px">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  setting
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="/profile/edit">edit personal info</a>
                  <a class="dropdown-item" href="/profile/choosepic">change profile</a>
                </div>
              </div>
        </div>
        @endif
    </div>



    <div class="container" style="padding-top: 20px;padding-bottom:50px">
       
        @foreach ($post as $item)


        <div style="padding: 15px;margin-bottom:10px" class="card">
            <div style="text-align:right;">
                <label > Date : {{$item->uplodedTime}} </label>
            </div>
              
            <div style="margin-top: 5px;overflow:hidden;position:relative" class="row">
                <div class="col-3">
                    <img src={{$item->image}}
                    style="width: 100%" class="img-fluid" alt="">
                </div>

                <div class="col-9">
                    <div>
                        <label style="font-family: 'Tienne', serif;color:#000000;font-size:20px;" > 
                            {{$item->title}} </label>
                    </div>
                    <div style="padding-bottom:50px">
                        <p style="font-size: 16px;display:-webkit-box;
                        -webkit-box-orient:vertical;-webkit-line-clamp: 3; overflow: hidden;"> {{$item->body}} </p>
                    </div>

                    <div style="position: absolute;bottom:0px;text-align:right;width:90%;padding-top:50px">

                        @if (Auth::check() and Auth::id()==$item->writer_id)
                            <a class="btn btn-primary" href="/blog/{{$item->id}}/edit" style="margin-right: 15px;float:left">Edit</a> 
                            
                            <div style="display: inline-block;float:left">
                                {!! Form::open(['method' => 'POST', 'action' => ['App\Http\Controllers\PostsController@destroy',$item->id],'class'=>'pull-right']) !!}
                                {!! Form::hidden('_method', 'DELETE') !!}
                                {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                                {!! Form::close() !!}
                            </div>
                        @endif
                       


                       <i style="margin-right: 15px">Written By : {{$item->writter}}</i>
                        <a href="/blog/{{$item->id}}" class="btn btn-primary">Read more </a>
                    </div>
                </div>

            </div>
                
        </div>
        @endforeach
    </div>
</div>




@endsection