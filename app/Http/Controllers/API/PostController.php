<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
        $posts = Post::paginate(10);
        return response()->json(PostResource::collection($posts));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validated();
             
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/images');
                $images[] = $path;
            }
        }
             
        $post = Post::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'images' => $images,
            'category_id' => $validatedData['category_id'],
        ]);
             
        $post->tags()->sync($validatedData['tags']);
             
        return response()->json(new PostResource($post), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return response()->json(new PostResource($post));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);
             $validatedData = $request->validated();
             $images = [];
             
             if ($request->hasFile('images')) {
                 foreach ($request->file('images') as $image) {
                     $path = $image->store('public/images');
                     $images[] = $path;
                 }
             }
             
             $post->update([
                 'title' => $validatedData['title'],
                 'content' => $validatedData['content'],
                 'images' => $images,
                 'category_id' => $validatedData['category_id'],
             ]);
             
             $post->tags()->sync($validatedData['tags']);
             
             return response()->json(new PostResource($post), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return response()->json(null, 204);
    }
}
