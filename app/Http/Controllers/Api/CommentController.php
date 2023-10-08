<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\CommentCollection;
use App\Http\Resources\Singles\CategoryResource;
use App\Http\Resources\Singles\CommentResource;
use App\Http\Traits\HasApi;
use App\Http\Traits\Validations\HasCommentValidation;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // TODO: After that complete The PostController, check this function to work correct
    use HasApi,HasCommentValidation;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize(\userPermission::IndexComment->name);
        $data= new CommentCollection(Comment::all());
        return $this->indexResponse($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize(\userPermission::CreateComment->name);
        $storeValidation=$this->storeValidation($request);
        $validator=$storeValidation['validator'];
        $inputs=$storeValidation['inputs'];
        if ($validator->fails()) {
            return $this->errorResponse($validator);
        }
        $validator->validate();
        $comment= Comment::create($inputs);
        $data= new CommentResource($comment);
        return $this->storeResponse($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        $this->authorize(\userPermission::ShowComment->name);
        $data= new CategoryResource($comment);
        return $this->showResponse($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $this->authorize(\userPermission::EditComment->name);
        $updateValidation=$this->updateValidation($request);
        $validator=$updateValidation['validator'];
        $inputs=$updateValidation['inputs'];
        if ($validator->fails()) {
            return $this->errorResponse($validator);
        }
        $validator->validate();

        $comment->update($inputs);
        $data= new CommentResource($comment);
        return $this->updateResponse($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $this->authorize(\userPermission::DestroyComment->name);
        $comment->delete();
        return $this->destroyResponse();
    }
}
