<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


use App\Models\User;
use App\Models\Post;

use Carbon\Carbon;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function __construct()
    {
        $this->middleware('auth',['only'=>['store','create','destroy','update','edit']]);
    }




    public function index()
    {
        $post = Post::orderBy('id','desc')->get();
        return view('pages.home')->with('posts',$post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'photo'=>'image|nullable'
        ]);


       if(Auth::check()){
            $user =  Auth::user();

            $tm = Carbon::now('+6:30');
            $tm_time= $tm->format('g:i:s A');
            $tm_date=$tm->toFormattedDateString();
            $confirm_time=$tm_date." - ".$tm_time;
            $postData =[
                'title'=>$request->title,
                'body'=>$request->body,
                'image'=>'no_image',
                'uplodedTime'=>$confirm_time,
                'updatedTime'=>$confirm_time,
                'writter'=>$user->name
            ] ;

            if($request->hasFile('photo')){
                $fileName=time().'.jpg';
                $path = $request->file('photo')->storeAs('public/postImages',$fileName);

                $postData['image']=$fileName;
            }
            
            

            $post= new Post($postData);
            
            $user->posts()->save($post);

            // return $user->created_at;
       }
       return redirect('/')->with('success','Post uploaded successfully !!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post =  Post::find($id);
        $writter = $post->user;
        $related_post =Post::where('id','!=',$id)->orderBy('id','desc')->take(5)->get();
        return view('posts.show',compact('post','writter','related_post'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
            $post = Post::find($id);
            if($post->writer_id == Auth::id()){
                return view('posts.edit')->with('post',$post);
            }else{
                return redirect('/');
            }
            
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if(Auth::check() and $post->writer_id ==Auth::id()){
            

            $this->validate($request ,[
                'title'=>'required',
                'body'=>'required',
                'photo'=>'image|nullable'
            ]);

            if($request->hasFile('photo')){
                $fileName=$post->getRawOriginal('image');
                $path = $request->file('photo')->storeAs('public/postImages',$fileName);
            }

            $post->title = $request->title;
            $post->body = $request->body;

            $post->save();
        }
        return redirect('/blog')->with('success','updated successfully!!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =  Post::find($id);

        if(!Auth::check() and Auth::id() != $post->writer_id ){
            return redirect('/blog')->with('error','You are not owner of this post');
        }

        if($post->image != 'no_image'){
            Storage::delete('public/postImages/'.$post->getRawOriginal('image'));
     
        }

        $post->delete();
        return redirect('/blog')->with('success','Post Deleted successfully');
    }
}
