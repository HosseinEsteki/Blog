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
        self::creating(function ($item){
            $item->creator_id=\Auth::id();
        });
        self::created(function ($post){
            Action::create(['post_id'=>$post->id,'name'=>\userActions::Add->value]);
        });
        self::updated(function ($post){
            Action::create(['post_id'=>$post->id,'name'=>\userActions::Edit->value]);
        });
        self::deleted(function ($post){
            Action::create(['post_id'=>$post->id,'name'=>\userActions::Delete->value]);
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
    public function categories(){
        return $this->belongsTo(Category::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
