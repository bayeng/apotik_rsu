<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TujuanRequest;
use App\Http\Resources\ResponseResource;
use App\Models\Tujuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TujuanController extends Controller
{
    public function index()
    {
        try {
            $tujuans = Tujuan::latest()->get();

            if ($tujuans->isEmpty()) {
                return new ResponseResource(false, 'data tujuan kosong', null);
            }

            return new ResponseResource(true, 'list data tujuan', $tujuans);
        } catch (\Exception $e) {
            Log::error('Error fetching tujuans data: ' . $e->getMessage());
            return new ResponseResource(false, 'Failed to fetch data', null);
        }
    }

    public function store(TujuanRequest $request)
    {
        try {
            $validatedTujuan = $request->validated();
            $tujuan = Tujuan::create($validatedTujuan);

            return new ResponseResource(true, 'berhasil membuat data tujuan', $tujuan);
        } catch (\Exception $e) {
            Log::error('Error fetching tujuans data: ' . $e->getMessage());
            return new ResponseResource(false, 'Failed to fetch data', null);
        }
    }

    public function destroy($id)
    {
        try {
            $tujuan = Tujuan::find($id);
            $tujuan->delete();
            return new ResponseResource(true, 'berhasil menghapus data tujuan', $tujuan);
        } catch (\Exception $e) {
            Log::error('Error fetching tujuans data: ' . $e->getMessage());
            return new ResponseResource(false, 'Failed to fetch data', null);
        }
    }
}
