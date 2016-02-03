<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    protected $fillable=[
        'nama_download',
        'file_download'        
    ];

    protected $primaryKey = "id_download";
}
