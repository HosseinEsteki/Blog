<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'title',
        'post_id',
        'creator_id',
        'status'
    ];
    protected $attributes=[
        'status'=>0
    ];
    protected static function boot()
    {
        self::creating(function ($item) {
            if($item->creator_id==null)
                $item->creator_id = \Auth::id();
        });
        self::created(function ($comment) {
            Action::create(['user'=>$comment->creator->email,'model'=>\Models::Comment->name,'model_name' => $comment->creator->email, 'action' => \UserActions::Add->name]);
        });
        self::updated(function ($comment) {
            Action::create(['user'=>$comment->creator->email,'model'=>\Models::Comment->name,'model_name' => $comment->creator->email, 'action' => \UserActions::Edit->name]);
        });
        self::deleting(function ($comment) {
            Action::create(['user'=>$comment->creator->email,'model'=>\Models::Comment->name,'model_name' => $comment->creator->email, 'action' => \UserActions::Delete->name]);
        });
        parent::boot();
    }
    public function creator()
    {
        return $this->belongsTo(User::class);
    }
}
