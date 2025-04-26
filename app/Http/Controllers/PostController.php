<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userid = Auth::id();
        $posts = Post::where('user_id',$userid)->get(); //from Post model, get all posts with userid loggedin.

        if(Auth::check())
            return view('posts.index', [
                'posts' => $posts
            ]);
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Return view create
        if(Auth::check())
            return view('posts.create');
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Save data from createForm
        $request->validate([
            'title' => 'required|max:200',
            'content' => 'required',
        ]);
        //which user creates which post
        $post = [
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id()
        ];

        Post::create($post);
        if(Auth::check())
            return redirect()->route('posts.index');
        abort(404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //ose
        // $allmyposts = Post::where('user_id', Auth::id());
        // $post = $allmyposts->find($id);

        $post = Post::where(['id' => $id, 'user_id' => Auth::id()])->first();
        if(!($post == true)) abort(404);
        return view('posts.edit',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Update what is in editForm
        $request->validate([
            'title' => 'required|max:200',
            'content' => 'required',
        ]);

        $allmyposts = Post::where('user_id', Auth::id());
        $post = $allmyposts->find($id);

        $data = [
            'title' => $request->title,
            'content' => $request->content
        ];

        $post->update($data);
        if(Auth::check())
            return redirect()->route('posts.index');
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::where(['id' => $id, 'user_id' => Auth::id()])->first();
        if(!is_null($post))
            $post->delete();
        return redirect()->route('posts.index');
    }

    public function allposts()
    {
        //allposts per homepage
        $posts = Post::paginate(5);
        return view('homepage', [
            'posts' => $posts
        ]);
    }
}
