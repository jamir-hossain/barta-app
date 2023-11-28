<?php

namespace App\Http\Controllers;

use App\Models\PostComment;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $user = auth()->user();

        PostComment::create([
            'user_id' => $user->id,
            'post_id' => $postId,
            'comment' => $request->comment,
        ]);

        return back();
    }
}
