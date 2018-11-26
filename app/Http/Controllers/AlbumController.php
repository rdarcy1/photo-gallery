<?php

namespace App\Http\Controllers;

use App\Models\Album;

class AlbumController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('albums.index', ['albums' => Album::all()]);
    }

    /**
     * @param Album $album
     * @return \Illuminate\View\View
     */
    public function show(Album $album)
    {
        return view('albums.show', compact('album'));
    }
}
