<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SuplierController extends Controller
{
    public function index()
    {
        $response = Http::get('https://api.restful-api.dev/objects');
        $data = $response->json();
        return view('pages.suplier',[
            'supliers' => $data
        ]);
    }
}
