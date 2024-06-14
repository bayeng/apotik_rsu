<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatObat extends Model
{
    use HasFactory;

    public $guarded = ['id'];

    public function obatkeluar() {
        return $this->belongsTo(ObatKeluar::class, 'id_obat_keluar');
    }
}