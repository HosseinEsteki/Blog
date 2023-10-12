<?php

namespace App\Models;

use App\Traits\HasPhotoManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use PhotoModel;

class Photo extends Model
{
    use HasFactory, HasPhotoManager;

    protected $fillable = [
        'alt',
        'path',
        'model',
    ];

    /**
     * @param UploadedFile $file
     * @param PhotoModel $photoModel
     * @param string $alt
     * @return mixed
     */
    public static function store(UploadedFile $file, PhotoModel $photoModel, string $alt)
    {
        $model = $photoModel->name;
        $fields = compact('alt', 'model');
        $photo = self::create($fields);
        $photo->path = self::getNewPath($photo, $photoModel)['name'];
        $photo->save();
        self::SavePhoto($file, $photoModel, $photo);
        return $photo;
    }

    public function getPathAttribute(): string
    {
        if (isset($this->attributes['path'])) {
            $path = $this->getUrl($this->model);
            return $path . $this->attributes['path'];
        }
        return "";
    }

    public function getThumbnailPathAttribute(): string
    {
        if (isset($this->attributes['path'])) {
            $path = $this->getUrl($this->model) . static::$thumbnail;
            return $path . $this->attributes['path'];
        }
        return "";
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        self::creating(function ($item) {
            if ($item->creator_id == null)
                $item->creator_id = \Auth::id();
        });
        self::created(function ($photo) {
            Action::create(['user' => $photo->creator->email, 'model' => \Models::Photo->name, 'model_name' => $photo->alt, 'action' => \UserActions::Add->name]);
        });
        self::updated(function ($photo) {
            Action::create(['user' => $photo->creator->email, 'model' => \Models::Photo->name, 'model_name' => $photo->alt, 'action' => \UserActions::Edit->name]);
        });
        self::deleting(function ($photo) {
            Action::create(['user' => $photo->creator->email, 'model' => \Models::Photo->name, 'model_name' => $photo->alt, 'action' => \UserActions::Delete->name]);
        });
        self::deleted(function (Photo $photo) {
            self::DeletePhoto($photo);
        });
        parent::boot();
    }


}
