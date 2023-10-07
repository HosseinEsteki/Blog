<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use function App\slug;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'creator_id',
    ];
    protected $attributes = [
    ];


    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = slug($value);
    }

    protected static function boot()
    {
        self::creating(function ($item) {
            if($item->slug==null)
                $item->slug=$item->name;
            if($item->creator_id==null)
                $item->creator_id = \Auth::id();
        });
        self::created(function ($category) {
            Action::create(['user'=>$category->creator->email,'model'=>\models::Category->name,'model_name' => $category->name, 'action' => \userActions::Add->name]);
        });
        self::updated(function ($category) {
            Action::create(['user'=>$category->creator->email,'model'=>\models::Category->name,'model_name' => $category->name, 'action' => \userActions::Edit->name]);
        });
        self::deleting(function ($category) {
            Action::create(['user'=>$category->creator->email,'model'=>\models::Category->name,'model_name' => $category->name, 'action' => \userActions::Delete->name]);
        });
        parent::boot();
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
