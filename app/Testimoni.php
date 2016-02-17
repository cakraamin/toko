<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
	protected $fillable=[
        'nama',
        'instansi',
        'teks_testimoni'
    ];

    protected $primaryKey = "id_testimoni";
}
