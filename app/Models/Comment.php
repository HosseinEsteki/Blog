<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'creator_id'
    ];
    protected static function boot()
    {
        self::created(function ($comment){
            Action::create(['comment_id'=>$comment->id,'name'=>\userActions::Add->value]);
        });
        self::updated(function ($comment){
            Action::create(['comment_id'=>$comment->id,'name'=>\userActions::Edit->value]);
        });
        self::deleted(function ($comment){
            Action::create(['comment_id'=>$comment->id,'name'=>\userActions::Delete->value]);
        });
        parent::boot();
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function actions()
    {
        return $this->hasMany(Action::class);
    }
}
