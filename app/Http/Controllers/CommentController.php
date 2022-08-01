<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\CommentResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;


class CommentController extends Controller
{
    public function index(Request $request, Comment $comment, Post $post)
    {
        $comments = CommentResource::collection(Comment::with(['user', 'post'])->paginate(15));
        // $commentsCount = Comment::count();

        return Inertia::render('post/comment/CommentsList', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request, Post $post)
    {
        $validated = $request->validate([
            'content'   => 'required|min:1',
        ]);
        $validated['user_id'] = auth()->id();

        $post->comments()->create($validated);


        return Redirect::back()->with('success', 'comment posted!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        Post::withCount(['comments'])->find();
        return Redirect::route('post/HomePage');
    }

    public function edit(Comment $comment)
    {
        $this->authorize('update', $comment);
        return Inertia::render('post/comment/EditComment', compact('comment'));
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

        return Redirect::route('post/HomePage')->with('success', 'comment updated!');
    }


    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();
        return Redirect::back()->with('error', 'comment deleted!');
    }
}
