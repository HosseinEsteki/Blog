<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Role extends Model
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
        self::created(function ($role) {
            Action::create(['user'=>$role->creator->email,'model'=>\models::Role->name,'model_name' => $role->name, 'action' => \userActions::Add->name]);
        });
        self::updated(function ($role) {
            Action::create(['user'=>$role->creator->email,'model'=>\models::Role->name,'model_name' => $role->name, 'action' => \userActions::Edit->name]);
        });
        self::deleting(function ($role) {
            Action::create(['user'=>$role->creator->email,'model'=>\models::Role->name,'model_name' => $role->name, 'action' => \userActions::Delete->name]);
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
