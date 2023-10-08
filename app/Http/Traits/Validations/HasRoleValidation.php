<?php

namespace App\Http\Traits\Validations;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

trait HasRoleValidation
{
    use HasMakeValidation;
    private array $inputFields=['name','creator_id'];
    /**
     * check rules for Tag and make validation.
     * @param Request $request
     * @return array[inputs,validator] of request inputs & Validator
     */
    public function storeValidation(Request $request): array
    {
        $rules=[
            'name'=>'required|unique:roles',
            'creator_id'=>'required|exists:users,id',
        ];
        return $this->makeAndSend($request,$rules,$this->inputFields);
    }

    /**
     * check rules for Tag and make validation.
     * @param Request $request
     * @param $id
     * @return array[inputs,validator] of request inputs & Validator
     */
    public function updateValidation(Request $request,$id): array
    {
        $rules=[
            'name'=>['required',Rule::unique('roles')->whereNot('name',$id)],
            'creator_id'=>'required|exists:users,id',
        ];
        return $this->makeAndSend($request,$rules,$this->inputFields);
    }

}
