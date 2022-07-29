<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Inertia\Inertia;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function index(Post $post)
    {
        $posts = PostResource::collection(Post::with('user')->paginate(10));

        return Inertia::render('post/HomePage', compact('posts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('create', Post::class);
        return Inertia::render('post/CreatePost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = auth()->id();
        if ($request->filled('image'))
            $data['image'] = $request->image->store('public/assets');


        Post::create($data);

        return redirect('/homepage')->with('message', 'post created successfully!');
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
        return Inertia::render('post/EditPost', compact('post'));
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

        return Inertia::route('post/EditPost')->with('message', 'post updated successfully!');
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
    public function likePost(Post $post)
    {
        $post->like();
        $post->save();
        return back();
    }

    public function unlikepost(Post $post, $id)
    {
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
