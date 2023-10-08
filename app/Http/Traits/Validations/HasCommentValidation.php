<?php

namespace App\Http\Traits\Validations;

use Illuminate\Http\Request;

trait HasCommentValidation
{
    use HasMakeValidation;
    private array $inputs=['title','message','post_id','creator_id'];
    /**
     * check rules for Comment and make validation.
     * @param Request $request
     * @return array[inputs,validator] of request inputs & Validator
     */
    public function storeValidation(Request $request): array
    {
        $rules=[
            'post_id'=>'required|exists:posts,id',
            'creator_id'=>'required|exists:users,id',
            'title'=>'required',
            'message'=>'required',
        ];
        return $this->makeAndSend($request,$rules,$this->inputs);
    }
    /**
     * check rules for Comment and make validation.
     * @param Request $request
     * @return array[inputs,validator] of request inputs & Validator
     */
    public function updateValidation(Request $request): array
    {
        return $this->storeValidation($request);
    }
}
