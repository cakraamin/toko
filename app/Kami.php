<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kami extends Model
{
	protected $fillable=[
        'deskripsi',
        'gambar_kami'
    ];

    protected $primaryKey = "id_kami";
}
