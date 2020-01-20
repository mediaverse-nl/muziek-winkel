<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'albums';

    public $timestamps = true;

    protected $fillable = [];

    protected $dates = ['created_at', 'updated_at'];

    public function artist()
    {
        return $this->belongsTo('App\Artists','artist_id', 'id');
    }

    public function songs()
    {
        return $this->hasMany('App\Songs','album_id', 'id');
    }

    public function userAlbums()
    {
        return $this->hasMany('App\UserAlbums','album_id', 'id');
    }
}
