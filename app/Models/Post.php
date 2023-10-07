<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable=[
        'image',
        'title',
        'slug',
        'short-description',
        'description',
        'published',
        'category_id',
        'creator_id'
    ];
    protected static function boot()
    {
        self::creating(function ($item) {
            if($item->creator_id==null)
                $item->creator_id = \Auth::id();
        });
        self::created(function ($post) {
            Action::create(['user'=>$post->creator->email,'model'=>\models::Post->name,'model_name' => $post->name, 'action' => \userActions::Add->name]);
        });
        self::updated(function ($post) {
            Action::create(['user'=>$post->creator->email,'model'=>\models::Post->name,'model_name' => $post->name, 'action' => \userActions::Edit->name]);
        });
        self::deleting(function ($post) {
            Action::create(['user'=>$post->creator->email,'model'=>\models::Post->name,'model_name' => $post->name, 'action' => \userActions::Delete->name]);
        });
        parent::boot();
    }
    public function creator()
    {
        return $this->belongsTo(User::class);
    }
    public function categories(){
        return $this->belongsTo(Category::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
