<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'notlp' => 'required',
            'nama_bank' => 'required',
            'no_rekening' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $suplier = Suplier::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'notlp' => $request->notlp,
            'nama_bank' => $request->nama_bank,
            'no_rekening' => $request->no_rekening,
        ]);

        return new SuplierResource(true, 'Data suplier berhasil ditambahkan', $suplier);
    }
}
