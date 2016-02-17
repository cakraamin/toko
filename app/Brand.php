<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
	protected $fillable=[
        'nama_brand',
        'logo_brand'        
    ];

    protected $primaryKey = 'id_brand';
}
