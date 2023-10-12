<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\CategoryCollection;
use App\Http\Resources\Collections\TagCollection;
use App\Http\Resources\Singles\CategoryResource;
use App\Http\Resources\Singles\TagResource;
use App\Http\Traits\HasApi;
use App\Http\Traits\Validations\HasTagValidation;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TagController extends Controller
{
    use HasApi,HasTagValidation;
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize(\UserPermission::IndexTag->name);
        $data= new TagCollection(Tag::all());
        return $this->indexResponse($data);
    }

    /**
     * Store a newly created resource in storage.
     * @throws AuthorizationException
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->authorize(\UserPermission::StoreTag->name);
        $storeValidation=$this->storeValidation($request);
        $validator=$storeValidation['validator'];
        $inputs=$storeValidation['inputs'];
        if ($validator->fails()) {
            return $this->errorResponse($validator);
        }
        $validator->validate();
        $tag= Tag::create($inputs);
        $data= new TagResource($tag);
        return $this->storeResponse($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        $this->authorize(\UserPermission::ShowTag->name);
        $data= new CategoryResource($tag);
        return $this->showResponse($data);

    }

    /**
     * Update the specified resource in storage.
     * @throws AuthorizationException
     */
    public function update(Request $request, Tag $tag): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $this->authorize(\UserPermission::UpdateTag->name);
        $storeValidation=$this->storeValidation($request);
        $validator=$storeValidation['validator'];
        $inputs=$storeValidation['inputs'];
        if ($validator->fails()) {
            return $this->errorResponse($validator);
        }
        $validator->validate();
        $tag->update($inputs);
        $data=new TagResource($tag);
        return $this->updateResponse($data);
    }

    /**
     * Remove the specified resource from storage.
     * @throws AuthorizationException
     */
    public function destroy(Tag $tag): \Illuminate\Http\Response
    {
        $this->authorize(\UserPermission::DestroyTag->name);
        $tag->delete();
        return $this->destroyResponse();
    }
}
