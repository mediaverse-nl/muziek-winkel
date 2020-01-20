<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Songs extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'songs';

    public $timestamps = true;

    protected $fillable = [];

    protected $dates = ['created_at', 'updated_at'];

    public function album()
    {
        return $this->belongsTo('App\Albums','album_id', 'id');
    }
}
