<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Inertia\Inertia;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function index(StorePostRequest $request, Post $post)
    {
        $data = $request->validated();
        $posts = Post::latest();

        return Inertia::render('post/homepage', compact('posts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('create', Post::class);
        return Inertia::render('post/createpost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $data['user_id'] = auth()->id();

        $data = $request->validated();
        $validation['image'] = $request->image->store('public/assets');
        post::create($data);

        return Redirect::route('posts')->with('message', 'post created successfully!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */


    public function show(Post $post) //  show user's posts
    {
        $post = Post::get();
        // $post = Post::find($id);
        return Inertia::render('user/userprofile', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return Inertia::render('post/editpost', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, Post $post)
    {
        $data = $request->validated();
        $post->update($data);

        return Inertia::route('post/editpost')->with('message', 'post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        return Inertia::route('post/homepage')->with('message', 'post deleted successfully!');
    }
    //likes
    public function likePost(Post $post, $id)
    {
        $post = Post::find($id);
        $post->like();
        $post->save();
        return Inertia::route('post/homepage');
    }

    public function unlikepost(Post $post, $id)
    {
        $post = Post::find($id);
        $post->unlike();
        $post->save();
        return Inertia::route('post/homepage');
    }
    public function getlikescount(Post $post)
    {
        $post->likeCount;
        $post = Post::get();
        return Inertia::route('post/homepage');
    }
}
