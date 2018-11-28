<?php

namespace Tests\Unit\Models;

use App\Models\Album;
use App\Models\Image;
use App\Models\User;
use Tests\DatabaseTestCase;

class AlbumTest extends DatabaseTestCase
{
    /** @test */
    public function it_belongs_to_a_user()
    {
        $this->assertBelongsTo(Album::class, User::class, 'user');
    }

    /** @test */
    public function it_has_many_images()
    {
        $this->assertHasMany(Album::class, Image::class, 'images');
    }
}
