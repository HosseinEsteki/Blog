<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActionController extends Controller
{
    public function index()
    {
        $actions=\App\Models\Action::all();
        return view('actions',compact('actions'));
    }
}
