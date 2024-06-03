<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatMasuk extends Model
{
    public $guarded = ['id'];

    public function suplier()
    {
        return $this->belongsTo(Suplier::class);
    }
}
