<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Album
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Image[] $images
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Album newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Album newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Album query()
 * @mixin \Eloquent
 */
class Album extends Model
{
    protected $fillable = ['title', 'description'];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
