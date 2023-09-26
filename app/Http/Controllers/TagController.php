<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Auth;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(){
        $all_tags = Tag::all();
        return view('Tags.All-Tags',compact('all_tags'));
    }

    public function create(){
        return view('Tags.Create-Tag');
    }

    public function store(Request $request){
        // validations
        $creator_id = Auth::user();
        $request->validate([
            'name' => 'required',
        ]);
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->creator_id = $creator_id->id;
        $tag->save();
        return redirect()->route('all-tags')->with('success', 'Categorie created successfully.');
    }

    public function edit(){

    }

    public function update(){

    }

    public function delete(){

    }
}
