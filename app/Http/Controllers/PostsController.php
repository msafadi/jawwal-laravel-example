<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // SELECT posts.*, users.first_name, users.last_name
        // FROM posts INNER JOIN users ON users.id = posts.user_id

        // return Collection of "Post" Model objects
        // $posts = Post::all();

        $posts = Post::select([
                    'posts.*',
                    'users.first_name',
                    'users.last_name',
                ])
                ->join('users', 'users.id', '=', 'posts.user_id')
                ->orderBy('posts.created_at', 'DESC')
                ->orderBy('users.first_name', 'ASC')
                ->orderBy('users.last_name', 'ASC')
                ->get();
        
        return view('posts.index', [
            'posts' => $posts,
            'status' => session('status'), // \Session::get('status'), session()->get('status')
            'message' => session('message'),
        ]);
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
        $request->validate([
            'body' => 'required|string|max:500',
            'visibility' => ['in:public,friends,me'],
        ]);

        $post = new Post();
        $post->body = $request->post('body');
        $post->status = 'published';
        $post->visibility = $request->post('visibility', 'public');
        $post->user_id = 6;
        $post->save(); // Insert into posts table

        Session::put('message', 'This message will not disappear!');
        return redirect()
                ->route('posts.index')
                ->with('status', 'Post publsihed.'); // store falsh value in the session
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // SELECT * FROM posts WHERE id = $id
        $post = Post::findOrFail($id); // return "Post" Model object
        // if (!$post) {
        //     abort(404);
        //     return redirect()->route('posts.index');
        // }

        return view('posts.edit', [
            'post' => $post,
        ]);
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
        $request->validate([
            'body' => 'required|string|max:500',
            'visibility' => ['in:public,friends,me'],
        ]);

        $post = Post::findOrFail($id);

        $post->body = $request->post('body');
        $post->visibility = $request->post('visibility');
        if ($request->has('status')) {
            $post->status = $request->post('status');
        }
        $post->save(); // update!

        return redirect()->route('posts.index')->with('status', 'Post updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DELETE FROM posts WHERE id = $id
        Post::destroy($id);

        Session::flash('status', 'Post deleted.');
        return redirect()->route('posts.index');
    }
}
