<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * App\Models\Image
 *
 * @property-read \App\Models\Album $album
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\Models\Media[] $media
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image query()
 * @mixin \Eloquent
 */
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
