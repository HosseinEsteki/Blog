<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        // $all_comments = Comment::all();
        // return view('All-Categories',compact('all_comments'));
    }

    public function create(){
        $all_posts = Comment::all();
        return view('Posts.All-Posts',compact('all_posts'));
    }

    public function edit(){
        $all_posts = Comment::all();
        return view('Posts.All-Posts',compact('all_posts'));
    }

    public function delete(){
        $all_posts = Comment::all();
        return view('Posts.All-Posts',compact('all_posts'));
    }
}
