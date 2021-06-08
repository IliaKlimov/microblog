<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }

    public function index(Request $request)
    {
        $posts = Post::latest()
            ->with('author')
            ->paginate(6);

        return view('post.index', [
            'posts' => $posts]);
    }

    public function edit(Post $post)
    {
        return view('post.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|max:240',
            'body' => 'required',
            'visible' => 'required'
        ]);
        $post->update($data);

        return redirect()
            ->route('posts.edit', $post)
            ->with('success', 'Post updated!');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:240',
            'body' => 'required',
            'visible' => 'required'
        ]);
        $data['author_id'] = $request->user()->id;
        auth()->user()->posts()->create($data);

        return redirect()->back()->with('success', 'Post added!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
