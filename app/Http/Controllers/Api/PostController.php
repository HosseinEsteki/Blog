<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\PostCollection;
use App\Http\Traits\HasApi;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use HasApi;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return new PostCollection(Post::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
