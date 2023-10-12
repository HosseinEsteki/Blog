<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function App\message;

class Action extends Model
{
    use HasFactory;
    protected $fillable=[
        'user',
        'model',
        'model_name',
        'action'
    ];
    protected static function boot()
    {
        self::creating(function ($action){
            if($action->user==null)
            $action->user=\Auth::user()->name;
        });
        self::created(function ($action){
            switch($action->action){
                case \UserActions::Add->name:
                    message()->store();
                    break;
                case \UserActions::Edit->name:
                    message()->update();
                    break;
                case \UserActions::Delete->name:
                    message()->delete();
                    break;
                case \UserActions::Login->name:
                    message()->login();
                    break;
            }
        });
        parent::boot();
    }

}

