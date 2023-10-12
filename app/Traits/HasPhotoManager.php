<?php



namespace App\Traits;

use App\Models\Photo;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use PhotoModel;
use phpDocumentor\Reflection\Types\Self_;
use Symfony\Component\HttpFoundation\File\UploadedFile;

trait HasPhotoManager
{
    private static string $thumbnail = 'thumbnail/';

    /**
     * check Directory Exists For Photo Saving
     * @param PhotoModel $photoPath
     * @return void
     */
    private static function checkDirectoryExist(PhotoModel $photoPath): void
    {
        $path = "public" . $photoPath->value;
        $thumbnail = $path . static::$thumbnail;

        if (Storage::missing($path)) {
            Storage::makeDirectory($path);
        }
        if (Storage::missing($thumbnail)) {
            Storage::makeDirectory($thumbnail);
        }
    }

    /**
     * Convert ModelString To PhotoModel
     * @param string $model
     * @return PhotoModel|null
     */
    private static function getPhotoModel(string $model): ?PhotoModel
    {
        return match ($model) {
            PhotoModel::Post->name => PhotoModel::Post,
            PhotoModel::User->name => PhotoModel::User,
            PhotoModel::Category->name => PhotoModel::Category,
            default => null
        };
    }

    /**
     * Get URL By Photo Model
     * @param $photoModel
     * @return string
     */
    protected static function getUrl($photoModel): string
    {
        $path = static::getPhotoModel($photoModel)->value;
        return Storage::url('public' . $path);
    }

    /**
     * Get New Format Of Picture To webp Picture
     * @param Photo $photo
     * @param PhotoModel $photoModel
     * @return array[name,path,thumbnailPath]
     */
    protected static function getNewPath(Photo $photo,PhotoModel $photoModel): array
    {
        $name = $photo->id . '.webp';
        $path_address = storage_path('app/public' . $photoModel->value);
        $path=$path_address.$name;
        $thumbnailPath=$path_address . static::$thumbnail . $name;
        return compact('name','path','thumbnailPath');
    }
    /**
     * Save Photo To Storage File
     * @param UploadedFile $photoFile
     * @param PhotoModel $photoModel
     * @param Photo $photo
     * @return void
     */
    protected static function SavePhoto(UploadedFile $photoFile, PhotoModel $photoModel, Photo $photo): void
    {
        static::checkDirectoryExist($photoModel);
        $newPath=self::getNewPath($photo,$photoModel);
        $path = $newPath['path'];
        $thumbnailPath=$newPath['thumbnailPath'];
        Image::make($photoFile->getRealPath())->encode('webp', 10)->save($path);
        /**
         * composer require intervention/image
         * https://image.intervention.io/v2/introduction/installation
         * Create Thumbnail Folder
         */
        Image::make($photoFile->getRealPath())->fit(200)->encode('webp')->save($thumbnailPath);
    }

    protected static function DeletePhoto(Photo $photo)
    {
        $model=static::getPhotoModel($photo->model);
        $newPath = static::getNewPath($photo,$model);
        $thumbnailPath=$newPath['thumbnailPath'];
        $path = $newPath['path'];
        \File::delete([$path,$thumbnailPath]);
    }
}
