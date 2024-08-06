<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\CampingCampers;
use App\Models\CampingCategory;
use App\Models\CampingOrder;
use App\Models\CampingPricelist;
use App\Models\CampingReservation;
use App\Models\CampingReturn;

use DataTables;
use Notification;
use Validator;
use DB;

class CampingController extends Controller
{
    function __construct(
        CampingCampers $camping_campers,
        CampingCategory $camping_category,
        CampingOrder $camping_order,
        CampingPricelist $camping_pricelist,
        CampingReservation $camping_reservation,
        CampingReturn $camping_return
    )
    {
        $this->camping_campers = $camping_campers;
        $this->camping_category = $camping_category;
        $this->camping_order = $camping_order;
        $this->camping_pricelist = $camping_pricelist;
        $this->camping_reservation = $camping_reservation;
        $this->camping_return = $camping_return;
    }

    public function camping_category_index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->camping_category->all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<div class="btn-group">';
                        // $btn .= '<a href='.route('emails.b_template.edit',['id' => $row->id]).' class="btn btn-xs btn-warning"><i class="uil-edit"></i> Edit</a>';
                        // $btn .= '<a href='.route('b.transaction.invoice',['id' => $row->id]).' target="_blank" class="btn btn-xs btn-primary"><i class="uil-file-alt"></i> Invoice</a>';
                        $btn .= '</div>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('backend.campings.category.index');
    }

    public function camping_categori_simpan(Request $request)
    {
        $rules = [
            'nama_kategori'  => 'required',
            'status'  => 'required',
        ];

        $messages = [
            'nama_kategori.required'   => 'Kategori wajib diisi.',
            'status.required'   => 'Status Kategori wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->passes()) {
            $input['id'] = Str::uuid()->toString();
            $input['nama_kategori'] = $request->nama_kategori;
            $input['status'] = $request->status;
            $camping_category = $this->camping_category->create($input);
            if ($camping_category) {
                $message_title="Berhasil !";
                $message_content=$input['nama_kategori']." Berhasil Dibuat";
                $message_type="success";
                $message_succes = true;
            }
            $array_message = array(
                'success' => $message_succes,
                'message_title' => $message_title,
                'message_content' => $message_content,
                'message_type' => $message_type,
            );

            return $array_message;
        }
        return response()->json([
            'success' => false,
            'error' => $validator->errors()->all()
        ]);
    }
}
