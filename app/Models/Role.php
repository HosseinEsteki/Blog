<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Role extends Model
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
    self::creating(function ($role){
        $role->creator_id=Auth::id();

    });
    self::updating(function ($role){
        $role->creator_id=Auth::id();
    });
    self::created(function ($role){
        Action::create([
            'name'=>'create',
            'user_id'=>Auth::id(),
            'role_id'=>$role->id,
        ]);
    });
    self::updated(function ($role){
        Action::create([
            'name'=>'update',
            'user_id'=>Auth::id(),
            'role_id'=>$role->id,
        ]);
    });
    self::deleted(function ($role){
        Action::create([
            'name'=>'delete',
            'user_id'=>Auth::id(),
            'role_id'=>$role->id,
        ]);
    });
    parent::boot();
}


    public function creator(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function permissions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Permission::class,'role_permission');
    }

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
