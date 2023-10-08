<?php

namespace App\Http\Resources\Singles;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $permissions=$this->permissions->toArray();
        return [
            'name'=>$this->name,
            'permissions'=>$permissions
        ];
    }
}
