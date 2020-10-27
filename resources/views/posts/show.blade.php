{{-- For showing the specific post --}}

@extends('layouts.app')


@section('content')
    <div class="container">
        <div style="margin-top: 25px;display:inline-block;cursor: pointer;">
        <a href="/blog/{{$writter->id}}/profile">
                <img class="img-fluid" style="width: 50px;height:50px;border-radius:60%" 
                src="/storage/profile/{{$writter->profileImg}}"
             alt="">

             <strong style="margin-left: 15px;font-size:18px"> {{$writter->name}}</strong>
            </a>
        </div>

        <div style="margin-top: 20px">
            {{-- Date div --}}
            <div>
                <i style="font-size: 12px">Date : {{$post->uplodedTime}} </i>
            </div>

            {{-- Title div  --}}
            <div style="margin-top: 10px">
                <label style="font-family: Tienne;font-size:20px;" > {{$post->title}} </label>
            </div>
            {{-- post body  --}}

            <div style="margin-top: 15px">
                <div class="row" >
                    <div class="col-8">
                        @if ($post->image != '/storage/postImages/no_image')
                            <div style="width: 100%;height:500px;margin-bottom:50px">
                                <img src='{{$post->image}}' class="mx-auto d-block" style="width: 90%;height:100%"  alt="">
                            </div>
                        @endif

                        <div >
                            <p style="font-size: 16px"> {{$post->body}} </p>
                        </div>
                    </div>

                    <div class="col-4" >
                        <h4> Related Posts </h4>
                        @foreach ($related_post as $rl_post)

                        <div style="margin-top: 10px">
                            <a href="/blog/{{$rl_post->id}}" style="text-decoration: none">
                               
                                    <div style="text-align:right">
                                        <label style="font-size: 12px;color:black" > Date : {{$rl_post->uplodedTime}} </label>
                                    </div>
                                    <div style="overflow:hidden;position:relative;border:1px solid black" class="row">
                                        <div class="col-5" style="padding: 0px;height:120px">
                                            <img src={{$rl_post->image}}
                                            style="width: 100%;height:100%"  alt="">
                                        </div>
                
                                        <div class="col-7">
                                            <div style="padding: 2px">
                                                <p style="font-size: 13px;display:-webkit-box;font-family:Tienne;
                                                -webkit-box-orient:vertical;-webkit-line-clamp: 3; overflow: hidden;"> {{$rl_post->body}}</p>
                                            </div>
                                        </div>
                
                                    </div>
                            </a>
                        </div>
                        @endforeach




                            
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection