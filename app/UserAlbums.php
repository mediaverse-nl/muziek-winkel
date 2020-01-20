<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAlbums extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'user_albums';

    public $timestamps = true;

    protected $fillable = [];

    protected $dates = ['created_at', 'updated_at'];

    public function album()
    {
        return $this->belongsTo('App\Albums','album_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id', 'id');
    }
}
