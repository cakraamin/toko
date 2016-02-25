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
        'stok',
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

    public static function getDetail($id)
    {
        $hasil = DB::table('products')
            ->join('brands', 'products.id_brand', '=', 'brands.id_brand')
            ->join('categoris', 'products.id_kategori', '=', 'categoris.id_kategori')
            ->where('products.id_product','=',$id)
            ->first();

        return $hasil;
    }

    public static function getTransaksi($id)
    {
        $hasil = array();

        $kueri = DB::table('transaksis')->where('transaksis.id_transaksi','=',$id)->first();        
        $hasil = array(
            'kode_transaksi'        => $kueri->kode_transaksi,
            'nama'                  => $kueri->nama,
            'telp'                  => $kueri->telp,
            'email'                 => $kueri->email,
            'alamat'                => $kueri->alamat,
            'tujuan'                => $kueri->tujuan,
            'via'                   => $kueri->via,
            'paket'                 => $kueri->paket,
            'total'                 => $kueri->total,
            'ongkir'                => $kueri->ongkir
        );

        return $hasil;
    }
}
