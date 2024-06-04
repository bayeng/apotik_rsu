<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuplierRequest;
use App\Http\Resources\SuplierResource;
use App\Models\Suplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SuplierController extends Controller
{

    public function index()
    {
        $suplier = Suplier::latest()->paginate(5);

        return new SuplierResource(true, 'List data suplier', $suplier);
    }

    public function show($id)
    {
        $suplier = Suplier::find($id);
        if (!$suplier) {
            return new SuplierResource(false, 'Data suplier tidak ditemukan', null);
        }

        return new SuplierResource(true, 'Data suplier ditemukan', $suplier);
    }

    public function store(SuplierRequest $request)
    {
        $validateSuplier = $request->validated();

        $suplier = Suplier::create($validateSuplier);

        return new SuplierResource(true, 'Data suplier berhasil ditambahkan', $suplier);
    }

    public function update(SuplierRequest $request, $id)
    {
        $validateSuplier = $request->validated();
        $suplier = Suplier::find($id);

        if (!$suplier) {
            return new SuplierResource(false, 'Data suplier tidak ditemukan', null);
        }

        $suplier->update($validateSuplier);
        return new SuplierResource(true, 'Data suplier berhasil diubah', $suplier);
    }

    public function destroy($id)
    {
        $suplier = Suplier::find($id);
        if (!$suplier) {
            return new SuplierResource(false, 'Data suplier tidak ditemukan', null);
        }
        $suplier->delete();
        return new SuplierResource(true, 'Data suplier berhasil dihapus', $suplier);
    }

}
