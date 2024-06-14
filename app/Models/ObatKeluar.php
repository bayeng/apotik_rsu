<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatKeluar extends Model
{
    use HasFactory;

    public $guarded = ['id'];
    protected $with = ['user', 'tujuan'];

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function tujuan() {
        return $this->belongsTo(Tujuan::class, 'id_tujuan');
    }

    public function riwayatobat() {
        return $this->hasMany(RiwayatObat::class, 'id_obat_keluar');
    }
}