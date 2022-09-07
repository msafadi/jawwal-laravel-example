<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // SELECT * FROM posts
        $posts = Post::all(); // return Collection of "Post" Model objects
        
        return view('posts.index', [
            'name' => 'Jawwal',
            'url' => config('app.url'),
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
        // General Methods:
        // $request->input('body');
        // $request->get('body');
        // $request->body;
        // $request['body'];
        
        // Post Specific Methods:
        // $request->post('body');
        
        // GET Specific Methods:
        // $request->query('input');

        try {

            $post = new Post();
            $post->body = $request->post('body');
            $post->status = 'published';
            $post->visibility = $request->post('visibility', 'public');
            $post->user_id = 6;
            $post->save(); // Insert into posts table

        } catch (Exception $e) {
            return $e->getMessage();
        }

        return redirect()->route('posts.index');
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
