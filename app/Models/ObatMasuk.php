<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatMasuk extends Model
{
    public $guarded = ['id'];
    protected $with = ['suplier', 'user', 'obat'];

    public function suplier()
    {
        return $this->belongsTo(Suplier::class, 'id_suplier');
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_penerima');
    }
}
