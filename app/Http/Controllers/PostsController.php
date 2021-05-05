<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::published()->get();

        return view('post.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::published()->findOrFail($id);
        return view('post.show', compact('post'));
    }

    public function create()
    {
        return view('post.create');
    }
    
    public function store()
    {
        Post::create(request()->all());

        return redirect('/posts');
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $post->update(request()->all());
        
        return redirect('/posts');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/posts');
    }
}
