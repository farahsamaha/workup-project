<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class CommentController extends Controller
{
    public function index(Request $request, Comment $comment, Post $post)
    {
        $validated = $request->validate([
            'content'   => 'required|min:1',
        ]);

        $post->comments()->create($validated);
        $comments = Comment::all();

        return Inertia::render('user/homepage', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Comment::class);
        return Inertia::render('comments', compact('comment'));
    }

    public function store(Request $request, Post $post)
    {
        $validated = $request->validate([
            'content'   => 'required|min:1',
        ]);

        $post->comments()->create($validated);

        return Redirect::route('posts')->with('message', 'comment posted!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return Inertia::render('user/userprofile', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $validated = $request->validate([
            'content'   => 'required|min:1',
        ]);
        $comment->update($validated);

        return Redirect::route('posts')->with('message', 'comment posted!');
    }


    public function destroy(Comment $comment)
    {
        $comment->delete();
        return Inertia::route('posts')->with('message', 'comment deleted!');
    }
}
