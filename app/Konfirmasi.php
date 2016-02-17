<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konfirmasi extends Model
{
    protected $fillable=[
        'nama',
        'email',
        'screen_shoot',
        'status'
    ];

    protected $primaryKey = 'id_konfirmasi';
}
