<?php

namespace Tests\Unit\Support;

use App\Models\Album;
use App\Support\ImageImporter;
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

        $this->copyFilesToVfs();

        $this->importer
            ->setDisk('vfs')
            ->setAlbum($album)
            ->fromDirectory('album01');

        $this->assertSame(2, $album->images()->count());
    }

    protected function copyFilesToVfs()
    {
        $directory = base_path('tests/Support/stubs/images/album01');
        $files = array_diff(scandir($directory), ['.', '..']);
        foreach ($files as $file) {
            \Storage::disk('vfs')
                ->put('album01/' . $file, file_get_contents($directory . '/' . $file));
        }
    }
}
