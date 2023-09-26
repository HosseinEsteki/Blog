<?php
enum userActions: string
{
    case Add="Add";
    case Edit="Edit";
    case Delete="Delete";
    case Login="Login";
    case Register="Register";
}
function message()
{
    return new \App\Message();
}
