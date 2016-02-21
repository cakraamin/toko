<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categori extends Model
{
	protected $fillable=[
        'nama_kategori',
        'logo_kategori'        
    ];

    protected $primaryKey = 'id_kategori';    
}