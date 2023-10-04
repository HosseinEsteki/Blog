<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize(\userPermission::IndexCategory->value);
        $categories = Category::all()->toJson();
        return $categories;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize(\userPermission::CreateCategory->value);
        $validator = \Validator::make($request->all(), [
            'name'=>'required|unique:categories',
            'slug'=>'nullable|unique:categories'
        ]);

        if ($validator->fails()) {
            return response(['errors'=>$validator->errors()],422);
        }
        $validator->validate();
        $category= Category::create($request->only(['name','slug']));
        return $category->toJson();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $this->authorize(\userPermission::ShowCategory->value);
        return $category->toJson();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validator = \Validator::make($request->all(), [
            'name'=>'nullable|unique:categories',
            'slug'=>'nullable|unique:categories'
        ]);
        if ($validator->fails()) {
            return response(['errors'=>$validator->errors()],422);
        }
        $validator->validate();
        $this->authorize(\userPermission::EditCategory->value);

        $category->update($request->only(['name','slug']));
        return $category;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $this->authorize(\userPermission::DestroyCategory->value);
        $category->delete();
        return response()->noContent();
    }
}
