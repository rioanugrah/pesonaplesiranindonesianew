<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bromo;
use \Carbon\Carbon;

class BromoController extends Controller
{
    function __construct(
        Bromo $bromo
    )
    {
        $this->bromo = $bromo;
    }

    public function api_index()
    {
        $bromos = $this->bromo->orderBy('tanggal','asc')->get();
        // dd($bromos);
        if ($bromos->isEmpty()) {
            return response()->json([
                'success' => false,
                'message_content' => 'Data Belum Tersedia'
            ]);
        }

        foreach ($bromos as $key => $bromo) {
            $data[] = [
                'id' => $bromo->id,
                'tanggal' => Carbon::create($bromo->tanggal)->isoFormat('LLL'),
                'slug' => $bromo->slug,
                'title' => $bromo->title,
                'meeting_point' => $bromo->meeting_point,
                'category_trip' => $bromo->category_trip,
                'quota' => $bromo->quota,
                'max_quota' => $bromo->max_quota,
                'destination' => json_decode($bromo->destination),
                'include' => json_decode($bromo->include),
                'exclude' => json_decode($bromo->exclude),
                'text_price' => 'Rp. '.number_format($bromo->price,0,',','.'),
                'price' => $bromo->price,
                'discount' => $bromo->discount,
            ];
        }

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function b_index(Request $request)
    {

    }
}
