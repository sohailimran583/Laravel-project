<?php

namespace App\Http\Controllers;

use App\Http\Requests\{StorePost,UpdatePost};
use Illuminate\Http\Request;
use App\Models\BlogPost;
use Illuminate\Support\Facades\Gate;



class PostController extends Controller
{

   public function __construct()
   {
     $this->middleware('auth')->only(['create','destroy','edit','show','update']);
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index',['posts'=>BlogPost::withCount('comments')->get()]);

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
    public function store(StorePost $request)
    {
        $validated=$request->validated();
        $post =BlogPost::create($validated);
        helper_message($request,"add done");
        // $request->session()->flash('status','Blog ADD successfull');
        return redirect()->route('posts.show',['post'=>$post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('posts.show',['post'=>BlogPost::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {

        $post= BlogPost::findOrfail($id);
        $this->authorize('update',$post);
        return view ('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePost $request, $id)
    {
        $post=BlogPost::findOrfail($id);
        // if(Gate::denies('checkuser',$post)){
        //     helper_message($request,"Sorry you are not Authorize");
        //     return redirect()->route('posts.index');
        // }
        $this->authorize('update',$post);
        $validated =$request->Validated();
        $post->fill($validated);
        $post->save();
        $request->session()->flash('status','Blog Update successfull');
        return redirect()->route('posts.show',['post'=>$post->id]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $post=BlogPost::findOrfail($id);
        $this->authorize('delete',$post);
        $post->delete();
        helper_message($request,"deleted done");
        // $request->session()->flash('status','Blog Deleted successfull');
        return redirect()->route('posts.index');


    }
}
