<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable=[
        'id_brand',
        'id_kategori',
        'nama',
        'harga',
        'keterangan',
        'berat',
        'gambar'
    ];

    protected $primaryKey = 'id_product';

    public function categoris()
    {
        return $this->belongsToMany('App\Categori');
    }
}
