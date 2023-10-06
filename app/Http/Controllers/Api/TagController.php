<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\CategoryCollection;
use App\Http\Resources\Collections\TagCollection;
use App\Http\Resources\Singles\CategoryResource;
use App\Http\Resources\Singles\TagResource;
use App\Http\Traits\HasApi;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    use HasApi;
    private $rules=[
        'name'=>'required'
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize(\userPermission::IndexTag->name);
        $data= new TagCollection(Tag::all());
        return $this->indexResponse($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize(\userPermission::CreateTag->name);
        $validator = \Validator::make($request->all(), $this->rules);
        if ($validator->fails()) {
            return $this->errorResponse($validator);
        }
        $validator->validate();
        $tag= Tag::create($request->only(['name']));
        $data= new TagResource($tag);
        return $this->storeResponse($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        $this->authorize(\userPermission::ShowTag->name);
        $data= new CategoryResource($tag);
        return $this->showResponse($data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $this->authorize(\userPermission::EditTag->name);
        $validator = \Validator::make($request->all(), $this->rules);
        if ($validator->fails()) {
            return $this->errorResponse($validator);
        }
        $validator->validate();

        $tag->update($request->only(['name']));
        $data=new TagResource($tag);
        return $this->updateResponse($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $this->authorize(\userPermission::DestroyTag->name);
        $tag->delete();
        return $this->destroyResponse();
    }
}
