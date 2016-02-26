<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
	protected $fillable=[
        'nama',
        'telp',
        'email',
        'alamat',
        'kode_transaksi',
        'email',
        'tujuan',
        'via',
        'total',
        'paket',
        'ongkir'
    ];

    protected $primaryKey = 'id_transaksi';

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
