<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'creator_id',
    ];
    protected $attributes = [
    ];


    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::replace(' ','-',$value);
    }

    protected static function boot()
    {
        self::creating(function ($item) {
            $item->creator_id = \Auth::id();
        });
        self::created(function ($category) {
            Action::create(['category_id' => $category->id, 'name' => \userActions::Add->value]);
        });
        self::updated(function ($category) {
            Action::create(['category_id' => $category->id, 'name' => \userActions::Edit->value]);
        });
        self::deleted(function ($category) {
            Action::create(['category_id' => $category->id, 'name' => \userActions::Delete->value]);
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

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
