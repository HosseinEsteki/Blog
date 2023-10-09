<?php

namespace App\Http\Resources\Singles;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Collections\PermissionCollection;

class RoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $permissions=new PermissionCollection($this->permissions);
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'permissions'=>$permissions
        ];
    }
}
