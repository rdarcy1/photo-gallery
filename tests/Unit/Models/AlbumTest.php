<?php

namespace Tests\Unit\Models;

use App\Models\Album;
use App\Models\Image;
use Tests\DatabaseTestCase;

class AlbumTest extends DatabaseTestCase
{
    /** @test */
    public function it_has_many_images()
    {
        $this->assertHasMany(Album::class, Image::class, 'images');
    }
}
