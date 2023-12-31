<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'creator_id'
    ];


    protected static function boot()
    {
        self::creating(function ($item) {
            if($item->creator_id==null)
                $item->creator_id = \Auth::id();
        });
        self::created(function ($tag) {
            Action::create(['user'=>$tag->creator->email,'model'=>\Models::Tag->name,'model_name' => $tag->name, 'action' => \UserActions::Add->name]);
        });
        self::updated(function ($tag) {
            Action::create(['user'=>$tag->creator->email,'model'=>\Models::Tag->name,'model_name' => $tag->name, 'action' => \UserActions::Edit->name]);
        });
        self::deleting(function ($tag) {
            Action::create(['user'=>$tag->creator->email,'model'=>\Models::Tag->name,'model_name' => $tag->name, 'action' => \UserActions::Delete->name]);
        });
        parent::boot();
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
