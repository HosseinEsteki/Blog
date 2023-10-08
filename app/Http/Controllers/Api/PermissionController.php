<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\CategoryCollection;
use App\Http\Resources\Collections\PermissionCollection;
use App\Http\Traits\HasApi;
use App\Models\Category;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    use HasApi;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize(\userPermission::IndexPermission->name);
        $data= new PermissionCollection(Permission::all());
        return $this->indexResponse($data);
    }
}
