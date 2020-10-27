<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\Post;


class WritterController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['only'=>['edit','updatename','updatemail']]);
    }



    public function authors(){
        $writters = User::all();
        return view('pages.writters')->with('writters',$writters);
    }

    public function profile($id){
        $post = Post::where('writer_id','=',$id)->get();
        $user = User::find($id);
        return view('pages.WriterProfile',compact('post','user'));
    }

    public function edit(){
        if(Auth::check()){
            $user = User::find(Auth::id());
            if($user){
                return view('pages.editprofile',compact('user'));
            }
        }
    }

    public function updatename(Request $request){
        $user= User::find(Auth::id());
        $user->name=$request->name;
        $user->save();
        return redirect('/blog/'.Auth::id() .'/profile');
    }

    public function updatemail(Request $request){
        $user= User::find(Auth::id());
        $user->email=$request->email;
        $user->save();
        return redirect('/blog/'.Auth::id() .'/profile');
    }

    public function choose_picture(){
        $user = User::find(Auth::id());
        return view('pages.profileupload',compact('user'));
    }

    public function uploadprofile(Request $request){
       
        if($request->hasFile('pic')){
            $user = User::find(Auth::id());
            $fileName='userprofile_'. Auth::id().'.jpg';
            $path = $request->file('pic')->storeAs('public/profile',$fileName);
            $user->profileImg=$fileName;
            $user->save();
            return redirect('/')->with('success','change profile picture successfully!');

        }



    }
}
