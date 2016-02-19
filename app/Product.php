<?php

namespace App;

use DB;
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
   
    public static function coba()
    {        
        $hasil = DB::table('products')
            ->join('brands', 'products.id_brand', '=', 'brands.id_brand')
            ->join('categoris', 'products.id_kategori', '=', 'categoris.id_kategori')
            ->get();

        return $hasil;
    }
}
