<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ObatMasukResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ObatMasukController extends Controller
{
    public function index()
    {
        $obatMasuk = ObatMasuk::latest()->paginate(5);

        return new ObatMasukResource(true, 'list data obat masuk', $obatMasuk);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'suplier_id' => 'required',
            'obat_id' => 'required',
            'qty' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $obatMasuk = ObatMasuk::create([
            'suplier_id' => $request->suplier_id,
            'obat_id' => $request->obat_id,
            'qty' => $request->qty,
        ]);

        return new ObatMasukResource(true, 'Data obat masuk berhasil ditambahkan', $obatMasuk);
    }
}
