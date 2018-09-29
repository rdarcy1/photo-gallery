<?php

namespace Tests\Unit\Support;

use App\Models\Album;
use App\Support\ImageImporter;
use Spatie\MediaLibrary\Models\Media;
use Tests\DatabaseTestCase;

class ImageImporterTest extends DatabaseTestCase
{
    /** @var ImageImporter */
    protected $importer;

    protected function setUp()
    {
        parent::setUp();

        $this->importer = app(ImageImporter::class);
    }

    /** @test */
    public function it_imports_images_from_a_directory()
    {
        $album = factory(Album::class)->create();

        $directory = base_path('tests/Support/stubs/images/album01');

        $this->importer
            ->setAlbum($album)
            ->fromDirectory($directory);

        $this->assertSame(2, $album->images()->count());

    }
}
