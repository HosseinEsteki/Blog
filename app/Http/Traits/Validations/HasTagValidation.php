<?php

namespace App\Http\Traits\Validations;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

trait HasTagValidation
{
    use HasMakeValidation;
    private array $inputs=['name','creator_id'];
    /**
     * check rules for Tag and make validation.
     * @param Request $request
     * @return array[inputs,validator] of request inputs & Validator
     */
    public function storeValidation(Request $request): array
    {
        $rules=[
            'name'=>'required|unique:tags',
            'creator_id'=>'required|exists:users,id',
        ];
        return $this->makeAndSend($request,$rules,$this->inputs);
    }

    /**
     * check rules for Tag and make validation.
     * @param Request $request
     * @param int $id
     * @return array[inputs,validator] of request inputs & Validator
     */
    public function updateValidation(Request $request,int $id): array
    {
        $rules=[
            'name'=>['required',Rule::unique('tags')->whereNot('name',$id)],
            'creator_id'=>'required|exists:users,id',
        ];
        return $this->makeAndSend($request,$rules,$this->inputs);
    }
}
