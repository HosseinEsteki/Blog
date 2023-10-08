<?php

namespace App\Http\Traits\Validations;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

trait HasRolePermissionValidation
{
    use HasMakeValidation;

    /**
     * check rules for Tag and make validation.
     * @param Request $request
     * @return array[inputs,validator] of request inputs & Validator
     */
    public function updateValidation(Request $request): array
    {
        $rules = [
            'permissions' => 'nullable|array',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if (isset($request->permissions))
            $inputs = $request->only(['permissions'])['permissions'];
        else
            $inputs = [];
        return compact('validator', 'inputs');
    }

}
