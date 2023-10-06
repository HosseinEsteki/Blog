<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Permission extends Model
{
    use HasFactory;
    protected $fillable=[
        'name'
    ];
    protected $attributes=[
        'creator_id'=>2,
    ];

     protected static function boot()
    {
        self::creating(function ($permission){
            $permission->creator_id=Auth::id();
        });
        self::updating(function ($permission){
            $permission->creator_id=Auth::id();
        });
        self::created(function ($permission){
            Action::create(['permission_id'=>$permission->id,'name'=>\userActions::Add->name]);
        });
        self::updated(function ($permission){
            Action::create(['permission_id'=>$permission->id,'name'=>\userActions::Edit->name]);
        });
        self::deleted(function ($permission){
            Action::create(['permission_id'=>$permission->id,'name'=>\userActions::Delete->name]);
        });
        parent::boot();
    }

    public function creator(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function roles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Role::class,'role_permission');
    }

}
