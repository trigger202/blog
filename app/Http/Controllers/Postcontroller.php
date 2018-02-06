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
        // Auth::logout();
        // return redirect('login');

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

       return redirect('/')->with('status', 'New post created!');

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

        $user = Auth::user();
        $post = Post::findorfail($id);
        if(!$post)
        {
            exit("Post does NOT exist");
        }
        if($user->id!=$post->user->id)
        {
            exit("access denied");
        }

        return view('post_view', ['post'=>$post]);



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

    public function reaction(Request $request)
    {
        dd($request);
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
