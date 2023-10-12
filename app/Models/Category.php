<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
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

    public function getPhotoAttribute()
    {
        return $this->photos()->first();
    }

    public static function store(UploadedFile $file, string $alt,array $categoryFields)
    {
        $category= parent::create(compact($categoryFields));
        $photo= Photo::store($file,\PhotoModel::Category,$alt);
        $category->photos()->sync([$photo->id]);
        return $category;
    }


    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function photos()
    {
        return $this->belongsToMany(Photo::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
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
            Action::create(['user'=>$category->creator->email,'model'=>\Models::Category->name,'model_name' => $category->name, 'action' => \UserActions::Add->name]);
        });
        self::updated(function ($category) {
            Action::create(['user'=>$category->creator->email,'model'=>\Models::Category->name,'model_name' => $category->name, 'action' => \UserActions::Edit->name]);
        });
        self::deleting(function ($category) {
            Action::create(['user'=>$category->creator->email,'model'=>\Models::Category->name,'model_name' => $category->name, 'action' => \UserActions::Delete->name]);
        });
        parent::boot();
    }
}
