<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
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
    
    public function store(Request $request)
    {

        $name = $request->image_url->name;
        $content = file_get_contents($request->image_url);
        
        Storage::put($name, $content);
        
        Post::create($request->all());

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
