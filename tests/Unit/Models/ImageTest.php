<?php

namespace Tests\Unit\Models;

use App\Models\Album;
use App\Models\Image;
use Tests\DatabaseTestCase;

class ImageTest extends DatabaseTestCase
{
    /** @test */
    public function it_belongs_to_an_album()
    {
        $this->assertBelongsTo(Image::class, Album::class, 'album');
    }
}
