<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artists extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'artists';

    public $timestamps = true;

    protected $fillable = [''];

    protected $dates = ['created_at', 'updated_at'];

    public function albums()
    {
        return $this->hasMany('App\Albums','artist_id', 'id');
    }
}
