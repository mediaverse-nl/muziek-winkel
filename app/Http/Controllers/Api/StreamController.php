<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Songs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class StreamController extends Controller
{
    protected $song;

    public function __construct(Songs $song)
    {
        $this->song = $song;
    }

    public function show($id)
    {
        //check if auth
        $previewPath = '';

        if (Auth()->guest('auth:api')) {
            $previewPath = '\preview-long-';
        }else{
            $previewPath = '\preview-short-';
        }

        $song = $this->song->findOrFail($id);

        $filename = storage_path("app\songs\\".$previewPath.$song->file);

        $filesize = (int) File::size($filename);

        $file = File::get($filename);

        $response = Response::make($file, 200);
        $response->header('Content-Type', 'audio/mpeg');
        $response->header('Content-Length', $filesize);
        $response->header('Accept-Ranges', 'bytes');
        $response->header('Content-Range', 'bytes 0-'.$filesize.'/'.$filesize);

        return $response;
    }
}
