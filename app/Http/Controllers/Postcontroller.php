<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Auth;

class Postcontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogList = Post::all()->where('user_id', Auth::user()->id);

        return view('index',['blogList'=>$blogList ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check() )
            {
                return view('post_create');
            }
        return view('/login');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::check() )
            {
                $this->redirectToLoginPage();
            }

        $post = new Post();

        $post->user_id = Auth::user()->id;
        $post->title=$request->title;
        $post->text=$request->text;

        $post->save();
        return redirect('/');

    }

    public function redirectToLoginPage()
    {
        return view('/loggin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $post = Post::findorfail($id);
        if($post)
        {
            if($post->user_id==Auth::user()->id){
                var_dump($post->title); /*this is a temp view*/

                var_dump($post->text); /*this is a temp view*/
            }
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
