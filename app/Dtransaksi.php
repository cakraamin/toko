<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dtransaksi extends Model
{
	protected $fillable=[
        'id_product',
        'id_transaksi',
        'qty',
        'sub_total'
    ];	

    protected $primaryKey = 'id_dtransaksi';
}
