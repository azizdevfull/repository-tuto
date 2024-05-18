<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct(protected PostRepositoryInterface $postRepository)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PostResource::collection($this->postRepository->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return new PostResource($this->postRepository->create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new PostResource($this->postRepository->find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return new PostResource($this->postRepository->update($request->all(), $id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->postRepository->delete($id);
        return response()->json(null, 204);
    }
}
