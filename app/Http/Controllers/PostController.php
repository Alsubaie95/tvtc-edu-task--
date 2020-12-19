<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function index()
    {
        $posts = Post::all();

        return view('index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::find($id);

        return view('show', compact('post'));
    }

    public function create()
    {
        return view('post');
    }

    public function store(Request $request)
    {
        $post =  new Post;
        $post->title = $request->get('title');
        $post->body = $request->get('body');

        $post->save();

        return redirect('posts');

    }



    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();
        return redirect('posts');
    }
    public function editPost($id) {
        $post = Post::find($id);
        return view('edit', ['post' => $post]);
    }

    public function updatePost(Request $request, $id) {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect()->route('home')->with('success', 'Post has been updated successfully!');
    }
}
