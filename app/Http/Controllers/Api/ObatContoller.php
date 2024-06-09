<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ObatRequest;
use App\Http\Resources\ResponseResource;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ObatContoller extends Controller
{
    public function index()
    {
        try {
            $obats = Obat::latest()->get();
            if ($obats->isEmpty()) {
                return new ResponseResource(true, 'data obat kosong', null);
            }
            return new ResponseResource(true, 'list data obat', $obats);
        } catch (\Exception $e) {
            Log::error('Error fetching obat data: ' . $e->getMessage());
            return new ResponseResource(false, 'Failed to fetch data', null);
        }
    }

    public function show($id)
    {
        try {
            $obat = Obat::find($id);
            if (!$obat) {
                return new ResponseResource(true, 'data obat tidak ada', null);
            }
            return new ResponseResource(true, 'data obat ditemukan', $obat);
        } catch (\Exception $e) {
            Log::error('Error fetching obat data: ' . $e->getMessage());
            return new ResponseResource(false, 'Failed to fetch data', null);
        }
    }

    public function store(ObatRequest $request)
    {
        try {
            $validatedObat = $request->validated();
            $obat = Obat::create($validatedObat);
            return new ResponseResource(true, 'berhasil membuat obat', $obat);
        } catch (\Exception $e) {
            Log::error('Error fetching obat data: ' . $e->getMessage());
            return new ResponseResource(false, 'Failed to fetch data', null);
        }
    }

    public function update (ObatRequest $request, $id)
    {
        try {
            $obat = Obat::find($id);
            if (!$obat) {
                return new ResponseResource(false, 'tidak ada data obat', null);
            }

            $validatedObat = $request->validated();
            $obat->update($validatedObat);

            return new ResponseResource(true, 'berhasil update data obat', $obat);

        } catch (\Exception $e) {
            Log::error('Error fetching obat data: ' . $e->getMessage());
            return new ResponseResource(false, 'Failed to fetch data', null);
        }
    }

    public function destroy($id)
    {
        try {
            $obat = Obat::find($id);
            if (!$obat) {
                return new ResponseResource(true, 'tidak ada data obat', null);
            }

            $obat->delete();
            return new ResponseResource(true, 'sukses hapus data obat', $obat);
        } catch (\Exception $e) {
            Log::error('Error fetching obat data: ' . $e->getMessage());
            return new ResponseResource(false, 'Failed to fetch data', null);
        }
    }
}
