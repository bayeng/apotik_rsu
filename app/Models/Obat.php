<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    public $guarded = ['id'];

    public function obatmasuks()
    {
        return $this->hasMany(ObatMasuk::class);
    }
}
