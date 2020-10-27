@extends('layouts.app')

@section('content')
<div>
    <img src="/storage/appImages/authorcover.png" alt="">
</div>

<div class="container">
    <div class="row align-items-center" style="margin-top: 50px;padding-bottom:100px">
        
        @foreach ($writters as $writter)
            <div class="col-5 d-flex align-items-center hover-author " style="height:100px;margin:auto">
            <a href="/blog/{{$writter->id}}/profile" style="text-decoration: none">
                    <img style="width: 70px;height:70px;border-radius:50%" 
                    src="/storage/profile/{{$writter->profileImg}}"
                    alt="">

                

                 <strong style="margin-left: 30px;font-size:18px"> {{$writter->name}} </strong>
                </a>
            </div>
        @endforeach

    </div>
</div>
@endsection