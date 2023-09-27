<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class ApiCategoryController extends Controller
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
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
//        $this->authorize(\userPermission::CreateCategory->value);
        $validator = \Validator::make($request->all(), [
            'name'=>'required|unique:categories',
            'slug'=>'nullable|unique:categories'
        ]);

        if ($validator->fails()) {
            return redirect('/login')
                ->withErrors($validator)
                ->withInput();
        }
        $request->validate([
            'name'=>'required|unique:categories',
            'slug'=>'nullable|unique:categories'
        ]);

//        $this->validate($request,[
//            'name'=>'required|unique:categories',
//            'slug'=>'nullable|unique:categories'
//        ]);
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
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $this->authorize(\userPermission::EditCategory->value);
        $requestCategory=$request->category;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
