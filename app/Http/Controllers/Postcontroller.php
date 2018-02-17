<?php

namespace App\Http\Controllers;
use App\Post;
use App\Like;
use App\Comment;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Redirect;

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
        if(!Auth::check())
        {
            return redirect('login');
        }


        $blogList = Post::all()->where('user_id', Auth::user()->id);

        return view('posts.index',['blogList'=>$blogList ]);
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
                return view('posts.post_create');
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




        // dd($user->posts);


        return view('posts.post_view', ['post'=>$post]);



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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

        return view('posts.post_edit', ['post'=>$post]);



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
        $post = Post::findorfail($id);

        $post->title = $request->title;
        $post->text = $request->post_text;

        $post->save();

         return Redirect::back()->with('status', 'Post updated successfully!');
    }

    public function reaction(Request $request)
    {
        $user = Auth::user();
        $post = Post::findorfail($request->postID);
        if(!$post)
        {
            return "post does not exist";        
        }

        $ruels = Validator('name'=>'required')
        $comment = new Comment();

        $comment->post_id = $post->id;
        $comment->user_id = $user->id;
        $comment->comment= $request->comment;
        $comment->save();


        $message = "You have commented on $post->title ";
        if($request->like==1)
        {
            $like = new Like();
            $like->user_id = $user->id;
            $like->post_id = $post->id;
            $like->save();
            $message = "You have commented and liked on $post->title ";
        }
        
        return redirect::back()->with('status', $message);

    }


    /*
        // -1 post does not exist
        0 access denied
        1 post exists and user has access to it (his post)
    
    */
    public function UserHasAccessToResource($id)
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findorfail($id);

        if($post->user_id==Auth::user()->id)
        {
            $post->delete();
            return redirect::back()->with('status','Post Deleted');
            
        }
        else
            return redirect::back()->with('status','Becareful!, its not your post');
            
    }
}
