<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Layanan;

class CategoryLayanan extends Model
{
    protected $table = 'category_layanans';
    protected $fillable = ['name','slug'];

    public function layanan()
    {
        return $this->hasMany(Layanan::class);
    }
}
