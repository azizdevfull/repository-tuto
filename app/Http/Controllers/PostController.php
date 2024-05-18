<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PostResource::collection(Post::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return new PostResource(Post::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new PostResource(Post::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        $post->update($request->all());
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::destroy($id);
        return response()->json(null, 204);
    }
}
