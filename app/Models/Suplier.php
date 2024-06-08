<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Suplier extends Model
{
    use HasFactory;
    public $guarded = ['id'];

    public function obatMasuk()
    {
        return $this->hasMany(ObatMasuk::class);
    }
}
