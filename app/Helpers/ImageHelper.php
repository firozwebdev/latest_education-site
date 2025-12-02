<?php
namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageHelper
{
    /**
     * Save image to public folder and return path
     */
    public static function saveImage(UploadedFile $image, $folder = 'uploads')
    {
        $filename = uniqid() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs($folder, $filename, 'public');
        return '/storage/' . $path;
    }

    /**
     * Update image: delete old and save new
     */
    public static function updateImage(UploadedFile $image, $oldPath, $folder = 'uploads')
    {
        if ($oldPath && Storage::disk('public')->exists(str_replace('/storage/', '', $oldPath))) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $oldPath));
        }
        return self::saveImage($image, $folder);
    }
}
