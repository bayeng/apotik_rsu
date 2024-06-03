<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Suplier extends Model
{
    use HasFactory;
    public $guarded = ['id'];

    public function validateRequest(array $data)
    {
        $validator = Validator::make($data->all(), [
            'nama' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'notlp' => 'required',
            'nama_bank' => 'required',
            'no_rekening' => 'required',
        ]);

        return $validator;
    }

    public function obatMasuk()
    {
        return $this->hasMany(ObatMasuk::class);
    }
}
