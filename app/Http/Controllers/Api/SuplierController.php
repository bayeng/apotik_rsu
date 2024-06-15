<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuplierRequest;
use App\Http\Resources\ResponseResource;
use App\Http\Resources\SuplierResource;
use App\Models\Suplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SuplierController extends Controller
{

    public function index()
    {
        try {
            $supliers = Suplier::latest()->get();

            if ($supliers->isEmpty()) {
                return new ResponseResource(false, 'Data suplier tidak ditemukan', null);
            }
            return new ResponseResource(true, 'List data suplier', $supliers);
        } catch (\Exception $e) {
            Log::error('Error fetching suplier data: ' . $e->getMessage());
            return new ResponseResource(false, 'Failed to fetch data', null);
        }
    }

    public function show($id)
    {
        try {
            $suplier = Suplier::find($id);
            if (!$suplier) {
                return new ResponseResource(false, 'Data suplier tidak ditemukan', null);
            }

            return new SuplierResource(true, 'Data suplier ditemukan', $suplier);
        }  catch (\Exception $e) {
            Log::error('Error fetching suplier data: ' . $e->getMessage());
            return new ResponseResource(false, 'Failed to fetch data', null);
        }

    }

    public function store(SuplierRequest $request)
    {
        try {
            $validateSuplier = $request->validated();
            $suplier = Suplier::create($validateSuplier);
            return new ResponseResource(true, 'Data suplier berhasil ditambahkan', $suplier);
        } catch (\Exception $e) {
            Log::error('Error fetching suplier data: ' . $e->getMessage());
            return new ResponseResource(false, 'Failed to fetch data', null);
        }

    }

    public function update(SuplierRequest $request, $id)
    {
        try {
            $validateSuplier = $request->validated();
            $suplier = Suplier::find($id);

            if (!$suplier) {
                return new ResponseResource(false, 'Data suplier tidak ditemukan', null);
            }

            $suplier->update($validateSuplier);
            return new ResponseResource(true, 'Data suplier berhasil diubah', $suplier);
        } catch (\Exception $e) {
            Log::error('Error fetching suplier data: ' . $e->getMessage());
            return new ResponseResource(false, 'Failed to fetch data', null);
        }

    }

    public function destroy($id)
    {
        try {
            $suplier = Suplier::find($id);
            if (!$suplier) {
                return new ResponseResource(false, 'Data suplier tidak ditemukan', null);
            }
            $suplier->delete();
            return new ResponseResource(true, 'Data suplier berhasil dihapus', $suplier);
        } catch (\Exception $e) {
            Log::error('Error fetching suplier data: ' . $e->getMessage());
            return new ResponseResource(false, 'Failed to fetch data', null);
        }

    }

}
