<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['title', 'description'];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
