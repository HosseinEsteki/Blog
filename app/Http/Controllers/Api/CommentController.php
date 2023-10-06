<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\CategoryCollection;
use App\Http\Resources\Singles\CategoryResource;
use App\Http\Resources\Singles\CommentResource;
use App\Http\Traits\HasApi;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    use HasApi;
    protected $rules=[
        'post_id'=>'required|exist:posts,id',
        'message'=>'required'
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize(\userPermission::IndexComment->name);
        $data= new CategoryCollection(Category::all());
        return $this->indexResponse($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize(\userPermission::CreateComment->name);
        $validator = \Validator::make($request->all(), $this->rules);
        if ($validator->fails()) {
            return $this->errorResponse($validator);
        }
        $validator->validate();
        $comment= Comment::create($request->only(['post_id','message']));
        $data= new CommentResource($comment);
        return $this->indexResponse($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        $this->authorize(\userPermission::ShowComment->name);
        return new CategoryResource($comment);
        return $this->indexResponse($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $this->authorize(\userPermission::EditComment->name);
        $validator = \Validator::make($request->all(), $this->rules);
        if ($validator->fails()) {
            return $this->errorResponse($validator);
        }
        $validator->validate();

        $comment->update($request->only(['post_id','message']));
        return new CommentResource($comment);
        return $this->indexResponse($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $this->authorize(\userPermission::DestroyComment->name);
        $comment->delete();
        return response()->noContent();
        return $this->indexResponse($data);
    }
}
