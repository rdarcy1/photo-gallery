<?php

namespace App\Support;

use App\Models\Album;
use Illuminate\Filesystem\FilesystemAdapter;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use Ramsey\Uuid\Uuid;
use Storage;

class ImageImporter
{
    /**
     * The album to attach the images to.
     *
     * @var Album
     */
    protected $album;

    /**
     * Set the album.
     *
     * @param Album $album
     * @return $this
     */
    public function setAlbum(Album $album)
    {
        $this->album = $album;

        return $this;
    }

    /**
     * Import images from a directory to an album.
     *
     * @param string $directory
     */
    public function fromDirectory(string $directory)
    {
        $filesystem = new Filesystem(new Local($directory));

        foreach ($filesystem->listContents() as $file) {
            $imageModel = $this->album->images()->create();
        }
    }
}
