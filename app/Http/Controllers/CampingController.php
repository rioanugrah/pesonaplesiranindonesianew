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
                    ->addColumn('status', function($row){
                        switch ($row->status) {
                            case 'Aktif':
                                return '<span class="badge bg-success">Aktif</span>';
                                break;

                            case 'Non Aktif':
                                return '<span class="badge bg-danger">Non Aktif</span>';
                                break;

                            default:
                                # code...
                                break;
                        }
                    })
                    ->addColumn('action', function($row){
                        $btn = '<div class="btn-group">';
                        $btn .= '<a href="javascript:void(0)" onclick="edit(`'.$row->id.'`)" class="btn btn-xs btn-warning"><i class="uil-edit"></i> Edit</a>';
                        $btn .= '<a href="javascript:void(0)" onclick="hapus(`'.$row->id.'`)" class="btn btn-xs btn-danger"><i class="uil-trash"></i> Delete</a>';
                        // $btn .= '<a href='.route('emails.b_template.edit',['id' => $row->id]).' class="btn btn-xs btn-warning"><i class="uil-edit"></i> Edit</a>';
                        // $btn .= '<a href='.route('b.transaction.invoice',['id' => $row->id]).' target="_blank" class="btn btn-xs btn-primary"><i class="uil-file-alt"></i> Invoice</a>';
                        $btn .= '</div>';
                        return $btn;
                    })
                    ->rawColumns(['action','status'])
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

    public function camping_category_show($id)
    {
        $camping_campers = $this->camping_category->find($id);
        if (empty($camping_campers)) {
            return response()->json([
                'success' => false,
                'message_title' => 'Gagal',
                'message_content' => 'Kategori Tidak Ditemukan'
            ]);
        }
        return response()->json([
            'success' => true,
            'data' => $camping_campers
        ]);
    }

    public function camping_categori_update(Request $request)
    {
        $rules = [
            'edit_nama_kategori'  => 'required',
            'edit_status'  => 'required',
        ];

        $messages = [
            'edit_nama_kategori.required'   => 'Kategori wajib diisi.',
            'edit_status.required'   => 'Status Kategori wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->passes()) {
            $input['nama_kategori'] = $request->edit_nama_kategori;
            $input['status'] = $request->edit_status;
            $camping_category = $this->camping_category->find($request->edit_id)->update($input);
            if ($camping_category) {
                $message_title="Berhasil !";
                $message_content=$input['nama_kategori']." Berhasil Diupdate";
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

    public function camping_category_delete($id)
    {
        // dd($id);
        $camping_campers = $this->camping_category->find($id);
        if (empty($camping_campers)) {
            return response()->json([
                'success' => false,
                'message_title' => 'Gagal',
                'message_content' => 'Kategori Tidak Ditemukan'
            ]);
        }
        $camping_campers->delete();
        return response()->json([
            'success' => true,
            'message_title' => 'Berhasil',
            'message_content' => 'Kategori Berhasil Dihapus'
        ]);
    }

    public function camping_pricelist_index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->camping_pricelist->all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('camping_category_id', function($row){
                        return $row->camping_category->nama_kategori;
                    })
                    ->addColumn('price', function($row){
                        return 'Rp. '.number_format($row->price,0,',','.');
                    })
                    ->addColumn('status', function($row){
                        switch ($row->status) {
                            case 'Ready':
                                return '<span class="badge bg-success">Ready</span>';
                                break;

                            case 'Sold Out':
                                return '<span class="badge bg-danger">Sold Out</span>';
                                break;

                            default:
                                # code...
                                break;
                        }
                    })
                    ->addColumn('action', function($row){
                        $btn = '<div class="btn-group">';
                        $btn .= '<a href="javascript:void(0)" onclick="window.location.href=`'.route('b.camping_pricelist_edit',['id' => $row->id]).'`" class="btn btn-xs btn-warning"><i class="uil-edit"></i> Edit</a>';
                        $btn .= '<a href="javascript:void(0)" onclick="hapus(`'.$row->id.'`)" class="btn btn-xs btn-danger"><i class="uil-trash"></i> Delete</a>';
                        $btn .= '</div>';
                        return $btn;
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
        }
        return view('backend.campings.pricelist.index');
    }

    public function camping_pricelist_create()
    {
        $data['camping_categorys'] = $this->camping_category->all();
        return view('backend.campings.pricelist.create',$data);
    }

    public function camping_pricelist_simpan(Request $request)
    {
        $rules = [
            'camping_category_id'  => 'required',
            'nama_barang'  => 'required',
            'price'  => 'required',
            'stock'  => 'required',
            'status'  => 'required',
        ];

        $messages = [
            'camping_category_id.required'   => 'Kategori Camping wajib diisi.',
            'nama_barang.required'   => 'Nama Barang wajib diisi.',
            'price.required'   => 'Harga Barang wajib diisi.',
            'stock.required'   => 'Stock Barang wajib diisi.',
            'status.required'   => 'Status Barang wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->passes()) {
            $input['id'] = Str::uuid()->toString();
            $input['camping_category_id'] = $request->camping_category_id;
            $input['nama_barang'] = $request->nama_barang;
            $input['price'] = $request->price;
            $input['stock'] = $request->stock;
            $input['status'] = $request->status;
            $camping_pricelist = $this->camping_pricelist->create($input);
            if ($camping_pricelist) {
                $message_title="Berhasil !";
                $message_content=$input['nama_barang']." Berhasil Dibuat";
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

    public function camping_pricelist_edit($id)
    {
        $data['camping_pricelist'] = $this->camping_pricelist->find($id);
        if (empty($data['camping_pricelist'])) {
            return redirect()->back()->with('error','Data Tidak Ditemukan');
        }
        $data['camping_categorys'] = $this->camping_category->all();
        return view('backend.campings.pricelist.edit',$data);
    }

    public function camping_pricelist_update(Request $request,$id)
    {
        $rules = [
            'camping_category_id'  => 'required',
            'nama_barang'  => 'required',
            'price'  => 'required',
            'stock'  => 'required',
            'status'  => 'required',
        ];

        $messages = [
            'camping_category_id.required'   => 'Kategori Camping wajib diisi.',
            'nama_barang.required'   => 'Nama Barang wajib diisi.',
            'price.required'   => 'Harga Barang wajib diisi.',
            'stock.required'   => 'Stock Barang wajib diisi.',
            'status.required'   => 'Status Barang wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->passes()) {
            $input['camping_category_id'] = $request->camping_category_id;
            $input['nama_barang'] = $request->nama_barang;
            $input['price'] = $request->price;
            $input['stock'] = $request->stock;
            $input['status'] = $request->status;
            $camping_pricelist = $this->camping_pricelist->find($id)->update($input);
            if ($camping_pricelist) {
                $message_title="Berhasil !";
                $message_content=$input['nama_barang']." Berhasil Diupdate. Silahkan Ditunggu";
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

    public function camping_pricelist_delete($id)
    {
        // dd($id);
        $camping_pricelist = $this->camping_pricelist->find($id);
        if (empty($camping_pricelist)) {
            return response()->json([
                'success' => false,
                'message_title' => 'Gagal',
                'message_content' => 'Pricelist Tidak Ditemukan'
            ]);
        }
        $camping_pricelist->delete();
        return response()->json([
            'success' => true,
            'message_title' => 'Berhasil',
            'message_content' => 'Camping Pricelist Berhasil Dihapus'
        ]);
    }
}
