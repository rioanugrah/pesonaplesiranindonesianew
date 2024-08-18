<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KabupatenKota;
use App\Models\Kecamatan;
use App\Models\Provinsi;

class LocationController extends Controller
{
    function __construct(
        KabupatenKota $kabupaten_kota,
        Kecamatan $kecamatan,
        Provinsi $provinsi
    ){
        $this->kabupaten_kota = $kabupaten_kota;
        $this->kecamatan = $kecamatan;
        $this->provinsi = $provinsi;
    }

    public function Provinsi()
    {
        $data = $this->provinsi->all();
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function KabupatenKota(Request $request)
    {
        // dd($request->id);
        $get_id = (int)$request->id;
        $data = $this->kabupaten_kota->where('id_provinsi',$get_id)->pluck('nama', 'id');
        return $data;
    }

    public function Kecamatan(Request $request)
    {
        // dd($request->id);
        $get_id = (int)$request->id;
        $data = $this->kecamatan->where('id_kota',$get_id)->pluck('nama','id');
        return $data;
    }
}
