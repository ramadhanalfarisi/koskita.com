<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kost extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        "nama_kost", "alamat", "harga","file"
    ];

    public function fasilitas()
    {
        return $this->belongsToMany('App\Fasilitas');
    }
    // To use relationship one to many
    // public function costumer()
    // {
    //     return $this->hasMany('App\Costumer');
    // }
}
