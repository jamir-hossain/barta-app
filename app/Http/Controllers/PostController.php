<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages/post/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostRequest $request)
    {
        $user = auth()->user();

        Post::create([
            'user_id' => $user->id,
            'description' => $request->description,
        ]);

        return redirect()->to('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::with('user')->find($id);

        return view('pages/post/show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);

        return view('pages/post/update', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreatePostRequest $request, string $id)
    {
        Post::where('id', $id)->update([
            'description' => $request->description
        ]);

        return redirect()->to('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::find($id)->delete();

        return redirect()->to('/');
    }
}
