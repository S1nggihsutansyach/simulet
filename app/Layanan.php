<?php

namespace App;

use App\CategoryLayanan;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $fillable = ['name','slug','price','category_id','image','desc'];

    public function categorylayanan()
    {
        return $this->belongsTo(CategoryLayanan::class);
    }
}
