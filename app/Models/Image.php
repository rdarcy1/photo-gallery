<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Image extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = ['title', 'description'];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    /**
     * Attach an image file to the model.
     *
     * @param string $path
     */
    public function attachImageFile($path)
    {
        $this->addMedia($path)
            ->preservingOriginal()
            ->toMediaCollection();
    }
}
