<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['title', 'description'];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
