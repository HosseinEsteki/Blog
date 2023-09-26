<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Auth;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $all_categories = Category::all();
        return view('Categories.All-Categories',compact('all_categories'));
    }

    public function create(){
        return view('Categories.Create-Categorie');
    }

    public function store(Request $request){
        // validations
        $creator_id = Auth::user();
        $request->validate([
            'name' => 'required',
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->creator_id = $creator_id->id;
        $category->save();
        return redirect()->route('all-categories')->with('success', 'Categorie created successfully.');
    }

    public function edit(){

    }

    public function update(){

    }

    public function delete(){

    }

}
