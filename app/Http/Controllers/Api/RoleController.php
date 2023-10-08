<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\RoleCollection;
use App\Http\Resources\Singles\RoleResource;
use App\Http\Traits\HasApi;
use App\Http\Traits\Validations\HasRoleValidation;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    use HasApi, HasRoleValidation;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize(\userPermission::IndexRole->name);
        $data = new RoleCollection(Role::all());
        return $this->indexResponse($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize(\userPermission::CreateRole->name);
        $storeValidation = $this->storeValidation($request);
        $validator = $storeValidation['validator'];
        if ($validator->fails()) {
            return $this->errorResponse($validator);
        }
        $validator->validate();
        $role = Role::create($storeValidation['inputs']);
        $data = new RoleResource($role);
        return $this->storeResponse($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        $this->authorize(\userPermission::ShowRole->name);
        $data = new RoleResource(Role::with('permissions')->find($role->id));
        return $this->showResponse($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $this->authorize(\userPermission::EditRole->name);
        $updateValidation = $this->updateValidation($request,$role->id);
        $inputs = $updateValidation['inputs'];
        $validator = $updateValidation['validator'];
        if ($validator->fails()) {
            return $this->errorResponse($validator);
        }
        $validator->validate();
        $role->update($inputs);
        $data = new RoleResource($role);
        return $this->updateResponse($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $this->authorize(\userPermission::DestroyRole->name);
        $role->delete();
        return $this->destroyResponse();
    }
}
