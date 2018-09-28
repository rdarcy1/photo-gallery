<?php

namespace App\Support;

use App\Models\Album;
use Illuminate\Filesystem\FilesystemAdapter;
use Ramsey\Uuid\Uuid;
use Storage;

class ImageImporter
{
    /**
     * The filesystem disk.
     *
     * @var string
     */
    protected $disk;

    /**
     * The album to attach the images to.
     *
     * @var Album
     */
    protected $album;

    /**
     * Set the disk.
     *
     * @param string $disk
     * @return $this
     */
    public function setDisk(string $disk)
    {
        $this->disk = $disk;

        return $this;
    }

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
        $files = $this->storage()->files($directory);

        foreach ($files as $file) {
            $localPath = $this->copyFileToLocal($file);

            $imageModel = $this->album->images()->create();

        }
    }

    /**
     * Get the storage driver.
     *
     * @return FilesystemAdapter
     */
    protected function storage()
    {
        return Storage::disk($this->disk);
    }

    /**
     * Copy the file from the storage disk to a local temp directory.
     *
     * @param string $file
     * @return string
     */
    protected function copyFileToLocal($file)
    {
        $extension = '.' . pathinfo($file, PATHINFO_EXTENSION);
        $localPath = temp_path(Uuid::uuid4() . $extension);
        file_put_contents($localPath, $this->storage()->get($file));

        return $localPath;
    }
}
