<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ObatKeluarRequest;
use App\Http\Resources\ResponseResource;
use App\Models\Obat;
use App\Models\ObatKeluar;
use App\Models\RiwayatObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ObatKeluarController extends Controller
{
    public function index() {
        try {
            $obatKeluarData = ObatKeluar::with('riwayatobat')->latest()->get();

            $result = $obatKeluarData->map(function($obatKeluar) {
                return [
                    'id' => $obatKeluar->id,
                    'id_user' => $obatKeluar->id_user,
                    'nama_user' => $obatKeluar->user->nama,
                    'id_tujuan' => $obatKeluar->id_tujuan,
                    'nama_tujuan' => $obatKeluar->tujuan->nama,
                    'total_harga' => $obatKeluar->total_harga,
                    'created_at' => $obatKeluar->created_at,
                    'updated_at' => $obatKeluar->updated_at,
                    'riwayat_obat' => $obatKeluar->riwayatObat->map(function($riwayatObat) {
                        return [
                            'id' => $riwayatObat->id,
                            'nama_obat' => $riwayatObat->nama_obat,
                            'jumlah' => $riwayatObat->jumlah,
                            'harga' => $riwayatObat->harga,
                            'id_obat_keluar' => $riwayatObat->id_obat_keluar,
                            'created_at' => $riwayatObat->created_at,
                            'updated_at' => $riwayatObat->updated_at,
                        ];
                    })
                ];
            });

            return response()->json([
                'success' => true,
                'message' => 'Berhasil mengambil data obat keluar',
                'data' => $result
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching obat data: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data obat keluar',
                'errors' => [
                    'message' => 'Error: ' . $e->getMessage()
                ]
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $obatKeluarData = ObatKeluar::with('user', 'tujuan', 'riwayatObat')->findOrFail($id);

            $result = [
                'id' => $obatKeluarData->id,
                'id_user' => $obatKeluarData->id_user,
                'nama_user' => $obatKeluarData->user->nama,
                'id_tujuan' => $obatKeluarData->id_tujuan,
                'nama_tujuan' => $obatKeluarData->tujuan->nama,
                'total_harga' => $obatKeluarData->total_harga,
                'created_at' => $obatKeluarData->created_at,
                'updated_at' => $obatKeluarData->updated_at,
                'riwayat_obat' => $obatKeluarData->riwayatObat->map(function($riwayatObat) {
                    return [
                        'id' => $riwayatObat->id,
                        'nama_obat' => $riwayatObat->nama_obat,
                        'jumlah' => $riwayatObat->jumlah,
                        'harga' => $riwayatObat->harga,
                        'id_obat_keluar' => $riwayatObat->id_obat_keluar,
                        'created_at' => $riwayatObat->created_at,
                        'updated_at' => $riwayatObat->updated_at,
                    ];
                }),
            ];

            return response()->json([
                'success' => true,
                'message' => 'Berhasil mengambil data obat keluar by id',
                'data' => $result
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching obat keluar data: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data obat keluar by id',
                'errors' => [
                    'message' => 'Error: ' . $e->getMessage()
                ]
            ], 500);
        }
    }


    public function store(ObatKeluarRequest $request) {
        try {
            $requestData = $request->validated();
            $result = [];
            // tabel obat_keluars
            $obatKeluarsData = [
                'id_user' => $requestData['id_user'],
                'id_tujuan' => $requestData['id_tujuan'],
                'total_harga' => $requestData['total_harga'],
            ];
            $obatKeluar = ObatKeluar::create($obatKeluarsData);
            $idObatKeluar = $obatKeluar->id;

            // tabel riwayat_obats
            $riwayatObatResult = [];
            for($i = 0; $i < count($requestData['nama_obat']); $i++) {
                $riwayatObatData = [
                    'nama_obat' => Obat::where('id', $requestData['nama_obat'][$i])->first()->nama,
                    'jumlah' => $requestData['jumlah'][$i],
                    'harga' => $requestData['harga'][$i],
                    'id_obat_keluar' => $idObatKeluar
                ];
                $riwayatObat = RiwayatObat::create($riwayatObatData);
                Obat::where('nama', $requestData['nama_obat'][$i])->update(['stok' => DB::raw('stok - ' . $requestData['jumlah'][$i])]);

                $riwayatObatResult[] = $riwayatObatData;
            }
            $result = [
                'id' => $obatKeluar->id,
                'id_user' => $obatKeluar->id_user,
                'nama_user' => $obatKeluar->user->nama,
                'id_tujuan' => $obatKeluar->id_tujuan,
                'nama_tujuan' => $obatKeluar->tujuan->nama,
                'total_harga' => $obatKeluar->total_harga,
                'created_at' => $obatKeluar->created_at,
                'updated_at' => $obatKeluar->updated_at,
                'riwayat_obat' => $riwayatObatResult
            ];

            return new ResponseResource(true, 'Berhasil menambahkan data obat keluar', $result);
        } catch (\Exception $e) {
            Log::error('Error fetching obat data: ' . $e->getMessage());
            return new ResponseResource(false, 'Gagal menambahkan data obat keluar', null);
        }
    }
}