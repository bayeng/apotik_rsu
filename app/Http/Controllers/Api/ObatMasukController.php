<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Requests\ObatMasukRequest;
use App\Http\Resources\ResponseResource;
use App\Models\Obat;
use App\Models\ObatMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ObatMasukController extends Controller
{
    public function index()
    {
        try {
            $obatMasuk = ObatMasuk::latest()->get();
            if ($obatMasuk->isEmpty()) {
                return new ResponseResource(false, 'data obat-masuk tidak ada', null);
            }
            return new ResponseResource(true, 'list data obat-masuk', $obatMasuk);

        } catch (\Exception $e) {
            Log::error('Error fetching obat-masuks data: ' . $e->getMessage());
            return new ResponseResource(false, 'Failed to fetch data', null);
        }
    }

    public function show($id)
    {
        try {
            $obatMasuk = ObatMasuk::find($id);
            if (!$obatMasuk) {
                return new ResponseResource(false, 'data obat-masuk tidak ada', null);
            }
            return new ResponseResource(false, 'detail data obat-masuk ', $obatMasuk);

        } catch (\Exception $e) {
            Log::error('Error fetching obat-masuks data: ' . $e->getMessage());
            return new ResponseResource(false, 'Failed to fetch data', null);
        }
    }

    public function store(ObatMasukRequest $request)
    {
        try {
            $validatedObatMasuk = $request->validated();
            $obatMasuk = ObatMasuk::create($validatedObatMasuk);

            $obat = Obat::find($validatedObatMasuk['id_obat']);
            $obat->update(['stok' => $obat->stok + $validatedObatMasuk['jumlah']]);

            return new ResponseResource(true, 'berhasil membuat data Obat-Masuk', $obatMasuk);

        } catch (\Exception $e) {
            Log::error('Error fetching obat-masuks data: ' . $e->getMessage());
            return new ResponseResource(false, 'Failed to fetch data', null);
        }
    }

}
