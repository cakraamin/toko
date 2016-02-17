<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
	protected $fillable=[
        'judul_banner',
        'gambar_banner'        
    ];

    protected $primaryKey = 'id_banner';
}
