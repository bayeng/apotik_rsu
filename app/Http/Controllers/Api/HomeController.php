<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResponseResource;
use App\Models\Obat;
use App\Models\ObatKeluar;
use App\Models\ObatMasuk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function transaksikeluar() {
        $today = date('Y-m-d');
        $obatKeluar = ObatKeluar::whereDate('created_at', $today)->get();

        if ($obatKeluar->isEmpty()) {
            $result = '0';
        } else {
            $result = count($obatKeluar);
        }

        return new ResponseResource(true, 'Berhasil mengambil data', $result);
    }

    public function transaksimasuk() {
        $today = date('Y-m-d');
        $obatMasuk = ObatMasuk::whereDate('created_at', $today)->get();

        if ($obatMasuk->isEmpty()) {
            $result = '0';
        } else {
            $result = count($obatMasuk);
        }

        return new ResponseResource(true, 'Berhasil mengambil data', $result);
    }

    public function omzettoday() {
        $today = date('Y-m-d');
        $obatKeluar = ObatKeluar::whereDate('created_at', $today)->get();

        if ($obatKeluar->isEmpty()) {
            $result = '0';
        } else {
            $result = $obatKeluar->sum('total_harga');
        }

        return new ResponseResource(true, 'Berhasil mengambil data', $result);
    }

    public function dangerstok() {
        $result = [];
        $obat = Obat::where('stok', '<', 20)->get();

        if ($obat->isEmpty()) {
            $result = [];
        } else {
            $result = $obat;
        }

        return new ResponseResource(true, 'Berhasil mengambil data', $result);
    }

}
