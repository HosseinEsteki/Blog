<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tag extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'creator_id'
    ];
    protected static function boot()
    {
        self::created(function ($tag){
            Action::create(['tag_id'=>$tag->id,'name'=>\userActions::Add->value]);
        });
        self::updated(function ($tag){
            Action::create(['tag_id'=>$tag->id,'name'=>\userActions::Edit->value]);
        });
        self::deleted(function ($tag){
            Action::create(['tag_id'=>$tag->id,'name'=>\userActions::Delete->value]);
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
    }public function actions()
{
    return $this->hasMany(Action::class);
}
}
