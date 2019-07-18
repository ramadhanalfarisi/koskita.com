<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    public function kost()
    {
        return $this->belongsToMany('App\Kost');
    }
}
