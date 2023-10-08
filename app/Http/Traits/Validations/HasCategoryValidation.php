<?php

namespace App\Http\Traits\Validations;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use function App\slug;

trait HasCategoryValidation
{
    private array $inputs=['name','slug','creator_id'];
    /**
     * check rules for category and make validation.
     * @param Request $request
     * @return array[inputs,validator] of request inputs & Validator
     */
    public function storeValidation(Request $request): array
    {
        $inputs=$request->only($this->inputs);
        if(!isset($request->slug))
            $inputs['slug']=$inputs['name'];

        $inputs['slug']=slug($inputs['slug']);
        $rules=[
            'name'=>'required|unique:categories',
            'slug'=>'nullable|unique:categories',
            'creator_id'=>'nullable|exists:users,id'
        ];
        $validator = \Validator::make($inputs, $rules);
        return compact('inputs','validator');
    }

    /**
     * check rules for category and make validation.
     * @param Request $request
     * @param int $categoryId
     * @return array[inputs,validator] of request inputs & Validator
     * @throws AuthorizationException
     */
    public function updateValidation(Request $request, int $categoryId): array
    {
        $this->authorize(\userPermission::EditCategory->name);
        $inputs=$request->only($this->inputs);
        if (isset($inputs['slug']))
            $inputs['slug']=slug($inputs['slug']);
        $rule= Rule::unique('categories')->whereNot('id',$categoryId);
        $rules=[
            'name'=>['required',$rule],
            'slug'=>['required',$rule]
        ];
        $validator = \Validator::make($inputs, $rules);
        return compact('inputs','validator');
    }

}
