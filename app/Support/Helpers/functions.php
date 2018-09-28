<?php

if (! function_exists('temp_path')) {
    /**
     * Return the temp path.
     *
     * @param string $path
     * @return string
     */
    function temp_path($path)
    {
        if (! is_dir(storage_path('temp'))) {
            mkdir(storage_path('temp'));
        }

        return storage_path('temp/' . $path);
    }
}
