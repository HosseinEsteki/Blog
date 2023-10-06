<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\CategoryCollection;
use App\Http\Resources\Singles\CategoryResource;
use App\Http\Traits\HasApi;
use App\Models\Category;
use App\Models\Role;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use function App\slug;

class CategoryController extends Controller
{
    use HasApi;

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
        $req=$request->only(['name','slug']);
        if($request->slug==null)
            $req['slug']=$req['name'];
        $req['slug']=slug($req['slug']);
        $rules=[
            'name'=>'required|unique:categories',
            'slug'=>'nullable|unique:categories'
        ];
        $this->authorize(\userPermission::CreateCategory->name);
        $validator = \Validator::make($req, $rules);
        if ($validator->fails()) {
            return $this->errorResponse($validator);
        }
        $validator->validate();
        $category= Category::create($req);
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
        $req=$request->only(['name','slug']);
        $req['slug']=slug($req['slug']);
        $rule= Rule::unique('categories')->whereNot('id',$category->id);
        $rules=[
            'name'=>['required',$rule],
            'slug'=>['required',$rule]
        ];
        $validator = \Validator::make($req, $rules);
        if ($validator->fails()) {
            return $this->errorResponse($validator);
        }
        $validator->validate();
        $category->update($req);
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
