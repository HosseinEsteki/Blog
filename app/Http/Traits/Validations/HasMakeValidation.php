<?php

namespace App\Http\Traits\Validations;

use Illuminate\Http\Request;

trait HasMakeValidation
{
    /**
     * Make Validation And Ready To Send In Controller
     * @param Request $request
     * @param array $rules
     * @param array $inputFields
     * @return array
     */
    public function makeAndSend(Request $request, array $rules, array $inputFields): array
    {
        $validator = \Validator::make($request->all(), $rules);
        $inputs=$request->only($inputFields);
        return compact('inputs','validator');
    }
}
