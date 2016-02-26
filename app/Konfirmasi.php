<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konfirmasi extends Model
{
    protected $fillable=[
        'nama',
        'email',
        'kode_transaksi'
        'screen_shoot'        
    ];

    protected $primaryKey = 'id_konfirmasi';
}
