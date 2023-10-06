<?php
namespace App;
use Illuminate\Support\Str;

require_once 'enums.php';
function message()
{
    return new \App\Message();
}
function slug($value){
    return Str::replace(' ','-',$value);
}
