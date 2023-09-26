<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index()
    {
        $all_posts = Post::all();
        return view('Posts.All-Posts', compact('all_posts'));
    }

    public function create()
    {
        return view('Posts.Create-Post');
    }
    public function store(Request $request)
    {
        $creator_id = Auth::user();
        // validations
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'creator_id' => 'required',

        ]);
        $post = new Post;
        $file_name = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $file_name);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $file_name;
        $category_id = new Category;
        $post->category_id = $category_id->id = $request->category_id;
        $post->creator_id = $creator_id->id;
        $post->save();
        return redirect()->route('all-posts')->with('success', 'Post created successfully.');
    }

    public function edit()
    {
        $all_posts = Post::all();
        return view('Posts.All-Posts', compact('all_posts'));
    }

    public function delete()
    {
        $all_posts = Post::all();
        return view('Posts.All-Posts', compact('all_posts'));
    }
}
