<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $fillable = ['nama_pelanggan','nama_reservasi','tanggal','total'];
}
