<?php

namespace App\Http\Controllers\Api;

use App\Albums;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    protected $album;

    public function __construct(Albums $album)
    {
        $this->album = $album;
    }

    public function show($id)
    {
        $album = $this->album
            ->with('songs')
            ->findOrFail($id);

        return response()->json(['data' => $album], 200);
    }

    public function store(Request $request){

        $fileName = uniqid().".png";
        $request->artwork->storeAs('artwork', $fileName);

        $artist = $this->album;
        $artist->artist_id = $request->artist_id;
        $artist->title = $request->title;
        $artist->artwork = $fileName;
        $artist->genre = $request->genre;
        $artist->save();

        return response()->json('created', 200);
    }
}
