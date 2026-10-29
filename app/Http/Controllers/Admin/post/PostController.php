<?php

namespace App\Http\Controllers\Admin\post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search= $request->query('search');
        $posts = Post::with('user')
            ->where('title', 'like', "%{$search}%")
            ->latest('id')
            ->paginate(15);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users=User::all(['id', 'name']);
        return view('admin.posts.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'content' => ['required', 'string', 'min:3'],
            'user_id' => ['required',  'exists:users,id'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('posts', 'public');

        }
            Post::create([
                'title' => $request->title,
                'content' => $request->content,
                'user_id' => $request->user_id,
                'image' => $path ?? null,
            ]);


        return redirect()->route('posts.index');
    }
    public function show(string $id)
    {
        $post = Post::findOrFail($id)->first();
        return view('admin.posts.show', compact('post'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post=Post::findOrFail($id);
        $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'content' => ['required', 'string', 'min:3'],
            'user_id' => ['required', 'exists:users,id'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);
        $oldimage = Post::findOrFail($id)->image;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('posts', 'public');

            if ($oldimage && Storage::disk('public')->exists($oldimage)) {
                Storage::disk('public')->delete($oldimage);
            }
        } else {
            $post->update([
                'title' => $request->title,
                'content' => $request->content,
                'user_id' => $request->user_id,
                'image' => $oldimage ?? null,
            ]);
        }

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }



        return redirect()->route('posts.index');
    }
}
