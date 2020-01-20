<?php

namespace App\Http\Controllers\Api;

use App\Artists;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArtistsController extends Controller
{
    protected $artist;

    public function __construct(Artists $artist)
    {
        $this->artist = $artist;
    }

    public function index(){
        $artist = $this->artist->get();

        return response()->json(['data' => $artist], 200);
    }

    public function show($id){
        $artist = $this->artist
            ->with('albums.songs')
            ->findOrFail($id);

        return response()->json(['data' => $artist], 200);
    }

    public function store(Request $request){

        $artist = $this->artist;
        $artist->name = $request->name;
        $artist->save();

        return response()->json('created', 200);
    }
}
