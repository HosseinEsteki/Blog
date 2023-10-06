<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'post_id',
        'creator_id',
        'status'
    ];
    protected $attributes=[
        'status'=>0
    ];
    protected static function boot()
    {
        self::creating(function ($item){
            $item->creator_id=\Auth::id();
        });
        self::created(function ($comment){
            Action::create(['comment_id'=>$comment->id,'name'=>\userActions::Add->name]);
        });
        self::updated(function ($comment){
            Action::create(['comment_id'=>$comment->id,'name'=>\userActions::Edit->name]);
        });
        self::deleted(function ($comment){
            Action::create(['comment_id'=>$comment->id,'name'=>\userActions::Delete->name]);
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
