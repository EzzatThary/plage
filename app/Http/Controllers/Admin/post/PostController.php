<?php

namespace App\Http\Controllers\Admin\post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'content' => ['required', 'string', 'min:3'],
            'user_name' => ['required', 'string', 'min:3', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('posts', 'public');
        }

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_name' => $request->user_name,
            'image' => $path,
        ]);

        return redirect()->route('posts.index');
    }
    public function show(string $id)
    {
        $post = Post::where('id', '=', $id)->first();
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::where('id', '=', $id)->first();
        return view('admin.posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate and update the post
        // For now, just return a success message
        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Validate and delete the post
        // For now, just return a success message
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}
