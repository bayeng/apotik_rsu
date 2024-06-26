<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tujuan extends Model
{
    use HasFactory;

    protected $guarded= ['id'];

    public function obatkeluar() {
        return $this->hasMany(ObatKeluar::class);
    }
}