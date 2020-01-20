<?php

namespace App\Http\Controllers\Api;

use Acekyd\LaravelMP3\LaravelMP3;
use App\Http\Controllers\Controller;
use App\Songs;
use Illuminate\Http\Request;

class SongsController extends Controller
{
    protected $song;

    public function __construct(Songs $song)
    {
        $this->song = $song;
    }

    public function index(){
        $songs = $this->song->with('album.artist')->get();

        return response()->json(['data' => $songs], 200);
    }

    public function store(Request $request){

        $fileName = uniqid().".mp3";
        $file = $request->file->storeAs('songs', $fileName);

        $filepath = storage_path("app\songs\\");

        \falahati\PHPMP3\MpegAudio::fromFile($filepath.$fileName)
            ->trim(25, 10)
            ->saveFile($filepath."preview-short-".$fileName);

        \falahati\PHPMP3\MpegAudio::fromFile($filepath.$fileName)
            ->trim(15, 30)
            ->saveFile($filepath."preview-long-".$fileName);

        $file = $request->file('file');
        $mp3 = new LaravelMP3();
        $duration = $mp3->getDuration($file);

        $song = $this->song;
        $song->album_id = $request->album_id;
        $song->title = $request->title;
        $song->file = $fileName;
        $song->duration = $duration;
        $song->original_file = $request->file;
        $song->track_number = random_int(9, 9);

        $song->save();

        return response()->json('created', 200);
    }
}
