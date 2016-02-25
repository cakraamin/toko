<?php

namespace App;

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
}
