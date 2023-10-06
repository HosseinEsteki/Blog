<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\ActionCollection;
use App\Http\Resources\Collections\CategoryCollection;
use App\Http\Traits\HasApi;
use App\Models\Action;
use App\Models\Category;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    use HasApi;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize(\userPermission::IndexAction->name);
        $data= new ActionCollection(Action::all());
        return $this->indexResponse($data);
    }
}
