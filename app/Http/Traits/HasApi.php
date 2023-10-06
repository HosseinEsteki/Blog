<?php

namespace App\Http\Traits;

use Illuminate\Validation\Validator;

trait HasApi
{
    public function errorResponse(Validator $validator)
    {
        return response(['errors'=>$validator->errors()],422);
    }
    public function indexResponse($data){
        return \response($data);
    }
    public function storeResponse($data){
        return \response($data,201);
    }

    public function showResponse($data)
    {
        return \response($data,200);
    }
    public function updateResponse($data){
        return \response($data,201);
    }

    public function destroyResponse()
    {
        return \response()->noContent();
    }
}
