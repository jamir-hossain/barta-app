<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        // $posts = Post::with('user', 'comments.user')->orderBy('created_at', 'desc')->get();
        $posts = Post::with(['user', 'comments' => function ($query) {
            $query->with('user')->orderBy('created_at', 'desc');
        }])->orderBy('created_at', 'desc')->get();

        foreach ($posts as $post) {
            if ($post->hasMedia()) {
                $post->image = $post->getMedia()->first()->getUrl();
            } else {
                $post->image = null;
            }
        }

        return view('index', compact('posts'));
    }
}
