<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Permission extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'creator_id'
    ];

    protected static function boot()
    {
        self::creating(function ($item) {
            if($item->creator_id==null)
                $item->creator_id = \Auth::id();
        });
        self::created(function ($permission) {
            Action::create(['user'=>$permission->creator->email,'model'=>\Models::Permission->name,'model_name' => $permission->name, 'action' => \UserActions::Add->name]);
        });
        self::updated(function ($permission) {
            Action::create(['user'=>$permission->creator->email,'model'=>\Models::Permission->name,'model_name' => $permission->name, 'action' => \UserActions::Edit->name]);
        });
        self::deleting(function ($permission) {
            Action::create(['user'=>$permission->creator->email,'model'=>\Models::Permission->name,'model_name' => $permission->name, 'action' => \UserActions::Delete->name]);
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
