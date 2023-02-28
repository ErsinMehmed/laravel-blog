<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param [type] $postId
     * @return void
     */
    public function store(Request $request, $postId)
    {
        $this->validate(
            $request,
            [
                'comment' => 'required',
            ]
        );

        Comment::create([
            'user_id' => auth()->user()->id,
            'post_id' => $postId,
            'comment' => $request->comment,
        ]);

        return redirect()->route('posts.show', $postId);
    }

    /**
     * Display the specified resource.
     *
     * @param [type] $id
     * @return void
     */
    public function show($id)
    {
        $post = Post::with('comments.user')->findOrFail($id);
        return view('posts.show', compact('post'));
    }
}
