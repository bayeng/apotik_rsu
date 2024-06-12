<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    public $guarded = ['id'];

    public function obatmasuk()
    {
        return $this->hasMany(ObatMasuk::class, 'id_obat');
    }
}
