<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Singles\RoleResource;
use App\Http\Traits\HasApi;
use App\Http\Traits\Validations\HasRolePermissionValidation;
use App\Models\Role;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RolePermissionController extends Controller
{
    use HasApi,HasRolePermissionValidation;

    /**
     * update Role Permissions
     * @param Request $request
     * @param Role $role
     * @return Application|Response|\Illuminate\Contracts\Foundation\Application|ResponseFactory
     */
    public function update(Request $request, Role $role): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $this->authorize(\userPermission::StoreRolePermission->name);
        $updateValidation = $this->updateValidation($request);
        $inputs = $updateValidation['inputs'];
        $validator = $updateValidation['validator'];
        if ($validator->fails()) {
            return $this->errorResponse($validator);
        }
        $validator->validate();
        $role->permissions()->sync($inputs);
        $data=new RoleResource($role);
        return $this->updateResponse($data);
    }
}
