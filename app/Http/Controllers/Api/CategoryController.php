<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\CategoryCollection;
use App\Http\Resources\Singles\CategoryResource;
use App\Http\Traits\HasApi;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use HasApi,\App\Http\Traits\Validations\HasCategoryValidation;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize(\userPermission::IndexCategory->name);
        $data= new CategoryCollection(Category::all());
        return $this->indexResponse($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize(\userPermission::CreateCategory->name);
        $storeValidation=$this->storeValidation($request);
        $validator=$storeValidation['validator'];
        if ($validator->fails()) {
            return $this->errorResponse($validator);
        }
        $validator->validate();
        $category= Category::create($storeValidation['inputs']);
        $data= new CategoryResource($category);
        return $this->storeResponse($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $this->authorize(\userPermission::ShowCategory->name);
        $data= new CategoryResource($category);
        return $this->showResponse($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $this->authorize(\userPermission::EditCategory->name);
        $updateValidation=$this->updateValidation($request,$category->id);
        $inputs=$updateValidation['inputs'];
        $validator=$updateValidation['validator'];
        if ($validator->fails()) {
            return $this->errorResponse($validator);
        }
        $validator->validate();
        $category->update($inputs);
        $data= new CategoryResource($category);
        return $this->updateResponse($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $this->authorize(\userPermission::DestroyCategory->name);
        $category->delete();
        return $this->destroyResponse();
    }
}
