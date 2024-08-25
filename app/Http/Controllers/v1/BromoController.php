<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
// use App\Http\Controllers\Payment\TripayController;
use App\Http\Controllers\v1\TransactionController;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Bromo;
use App\Models\BromoList;
use \Carbon\Carbon;
use \Carbon\CarbonPeriod;

use DataTables;
use Notification;
use Validator;
use DB;
use File;

class BromoController extends Controller
{
    function __construct(
        TransactionController $transaction,
        Bromo $bromo,
        BromoList $bromo_list
    )
    {
        $this->transaction = $transaction;
        $this->bromo = $bromo;
        $this->bromo_list = $bromo_list;
    }

    public function api_index()
    {
        $live_date = Carbon::today()->addDays(0);
        $week_start = $live_date->startOfWeek()->format('Y-m-d');
        $week_end = $live_date->endOfWeek()->format('Y-m-d');

        $bromos = $this->bromo->whereDate('tanggal','>=',$week_start)
                        ->whereDate('tanggal','<=',$week_end)
                        ->orderBy('tanggal','asc')
                        ->get();
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

    public function api_bromo_payment(Request $request, $id, $tanggal)
    {
        DB::beginTransaction();
        try {
            $live_date = Carbon::now();
            $bromo = $this->bromo->where('id',$id)
                                ->whereDate('tanggal',$tanggal)
                                ->first();
            $kode_jenis_transaksi = 'TRX-BRMO';
            $kode_random_transaksi = $live_date->format('Ym').rand(1000,9999);
            $input['id'] = Str::uuid()->toString();
            $input['transaction_code'] = $kode_jenis_transaksi.'-'.$kode_random_transaksi;
            $input['transaction_unit'] = $bromo->title.' - Booking Date '.$bromo->tanggal;
            $transaction_price = $bromo->category_trip == 'Publik' ? ($bromo->price - (($bromo->discount/100) * $bromo->price)) * $request->qty : $bromo->price - (($bromo->discount/100) * $bromo->price);

            $input['transaction_billing'] = json_encode([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'address' => $request->alamat,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);

            if($request->qty == 0 && $request->qty == null){
                $input['transaction_qty'] = 1;
            }else{
                $input['transaction_qty'] = $request->qty;
            }

            $input['transaction_price'] = $transaction_price;
            $input['user'] = auth()->user()->generate;
            $input['status'] = 'Unpaid';

            $transaction = $this->transaction->transaction(
                $input['transaction_code'],
                $input['transaction_unit'],
                $input['transaction_order'],
                $input['transaction_qty'],
                $request->first_name,
                $request->last_name,
                $request->email,
                $request->phone,
                $request->method,
                $input['status']
            );
            $bromo->quota = $bromo->quota - $request->qty+1;
            $bromo->update();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }
    }

    public function b_index(Request $request)
    {
        if ($request->ajax()) {
            $data = Bromo::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('data_bromo', function($row){
                        $list = '<div class="accordion" id="accordionExample">';
                        $list .=    '<div class="accordion-item">';
                        $list .=        '<h2 class="accordion-header" id="heading'.$row->id.'">';
                        $list .=            '<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$row->id.'" aria-expanded="false" aria-controls="collapse'.$row->id.'">'.$row->title.'</button>';
                        $list .=        '</h2>';
                        $list .=        '<div id="collapse'.$row->id.'" class="accordion-collapse collapse" aria-labelledby="heading'.$row->id.'" data-bs-parent="#accordionExample" style="">';
                        $list .=            '<div class="accordion-body">';
                        $list .=                '<div>Meeting Point : '.$row->meeting_point.'</div>';
                        $list .=                $row->descriptions;
                        $list .=                '<table class="table">';
                        $list .=                    '<tr>';
                        $list .=                        '<td class="text-center">Tanggal Berangkat</td>';
                        $list .=                        '<td class="text-center">Kuota</td>';
                        $list .=                        '<td class="text-center">Max Kuota</td>';
                        $list .=                        '<td class="text-center">Diskon</td>';
                        $list .=                    '</tr>';
                                                    foreach ($row->bromo_list as $key => $bromo_list) {
                        $list .=                    '<tr>';
                        $list .=                        '<td class="text-center">'.$bromo_list->departure_date.'</td>';
                        $list .=                        '<td class="text-center">'.$bromo_list->quota.'</td>';
                        $list .=                        '<td class="text-center">'.$bromo_list->max_quota.'</td>';
                        $list .=                        '<td class="text-center">'.$bromo_list->discount.'</td>';
                        $list .=                    '</tr>';
                                                    }
                        $list .=                '</table>';
                        $list .=            '</div>';
                        $list .=        '</div>';
                        $list .=    '</div>';
                        $list .= '</div>';

                        return $list;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<div class="btn-group">';
                        $btn .=     '<a href='.route('bromo.b_bromo_list',['id' => $row->id]).' class="btn btn-primary">Tambah List</a>';
                        $btn .=     '<a href='.route('bromo.b_bromo_detail',['id' => $row->id]).' class="btn btn-success">Detail</a>';
                        $btn .=     '<a href='.route('bromo.b_bromo_edit',['id' => $row->id]).' class="btn btn-warning">Edit</a>';
                        $btn .=     '<button class="btn btn-danger">Delete</button>';
                        // $btn .= '<button onclick="reupload(`'.$row->id.'`)" class="btn btn-info btn-xs"><i class="fas fa-file"></i> Re-upload</button>';
                        // $btn .= '<a href='.route('tour.edit',['id' => $row->id]).' class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>';
                        // $btn .= '<button onclick="hapus(`'.$row->id.'`)" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>';
                        $btn .= '</div>';
                        return $btn;
                    })
                    ->rawColumns(['action','data_bromo'])
                    ->make(true);
        }

        return view('backend.paket_wisata.bromo.index');
    }

    public function b_create()
    {
        return view('backend.paket_wisata.bromo.create');
    }

    public function b_simpan(Request $request)
    {
        $rules = [
            'title'  => 'required',
            'meeting_point'  => 'required',
            'category_trip'  => 'required',
            'descriptions'  => 'required',
            'upload_cover'  => 'required',
            'upload_image'  => 'required',
        ];

        $messages = [
            'title.required'   => 'Judul wajib diisi.',
            'meeting_point.required'   => 'Meeting Point wajib diisi.',
            'category_trip.required'  => 'Kategori Trip wajib diisi.',
            'descriptions.required'   => 'Deskripsi wajib diisi.',
            'upload_cover.required'   => 'Upload Cover Kuota wajib diisi.',
            'upload_image.required'   => 'Upload Image wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()){
            $path = public_path('backend/images/bromo');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            $input['id'] = Str::uuid()->toString();
            $input['slug'] = Str::slug($request->title);
            $input['title'] = $request->title;
            $input['descriptions'] = $request->descriptions;
            $input['meeting_point'] = $request->meeting_point;
            $input['category_trip'] = $request->category_trip;

            if ($request->file('upload_cover')) {
                $image_upload_cover = $request->file('upload_cover');
                $img_upload_cover = \Image::make($image_upload_cover->path());
                $img_upload_cover = $img_upload_cover->encode('webp',65);
                $input['images'] = 'UploadCover'.time().'.webp';
                $img_upload_cover->save(public_path('backend/images/bromo/').$input['images']);
            }

            $input_upload_image = [];
            foreach ($request->upload_image as $key => $upload_image) {
                $img_upload_image = \Image::make($upload_image->path());
                $img_upload_image = $img_upload_image->encode('webp',65);
                $input['images_all'] = 'UploadImage'.time().'.webp';
                $img_upload_image->save(public_path('backend/images/bromo/').$input['images_all']);
                $input_upload_image[$key] = $input['images_all'];
            }
            $input['body'] = json_encode($input['images_all']);
            $bromo = $this->bromo->create($input);

            if ($bromo) {
                $message_title="Berhasil !";
                $message_content="Paket Bromo Berhasil Dibuat";
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

    public function b_bromo_detail($id)
    {
        $data['bromo'] = $this->bromo->find($id);
        if (empty($data['bromo'])) {
            return redirect()->back();
        }
        return view('backend.paket_wisata.bromo.detail',$data);
    }

    public function b_bromo_edit($id)
    {
        $data['bromo'] = $this->bromo->find($id);
        if (empty($data['bromo'])) {
            return redirect()->back();
        }
        return view('backend.paket_wisata.bromo.edit',$data);
    }

    public function b_bromo_update(Request $request,$id)
    {
        $rules = [
            'title'  => 'required',
            'meeting_point'  => 'required',
            'category_trip'  => 'required',
            'descriptions'  => 'required',
            // 'upload_cover'  => 'required',
            // 'upload_image'  => 'required',
        ];

        $messages = [
            'title.required'   => 'Judul wajib diisi.',
            'meeting_point.required'   => 'Meeting Point wajib diisi.',
            'category_trip.required'  => 'Kategori Trip wajib diisi.',
            'descriptions.required'   => 'Deskripsi wajib diisi.',
            // 'upload_cover.required'   => 'Upload Cover Kuota wajib diisi.',
            // 'upload_image.required'   => 'Upload Image wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()){
            $input['slug'] = Str::slug($request->title);
            $input['title'] = $request->title;
            $input['descriptions'] = $request->descriptions;
            $input['meeting_point'] = $request->meeting_point;
            $input['category_trip'] = $request->category_trip;

            if ($request->file('upload_cover')) {
                $image_upload_cover = $request->file('upload_cover');
                $img_upload_cover = \Image::make($image_upload_cover->path());
                $img_upload_cover = $img_upload_cover->encode('webp',65);
                $input['images'] = 'UploadCover'.time().'.webp';
                $img_upload_cover->save(public_path('backend/images/bromo/').$input['images']);
            }

            if ($request->upload_image) {
                $input_upload_image = [];
                foreach ($request->upload_image as $key => $upload_image) {
                    $img_upload_image = \Image::make($upload_image->path());
                    $img_upload_image = $img_upload_image->encode('webp',65);
                    $input['images_all'] = 'UploadImage'.time().'.webp';
                    $img_upload_image->save(public_path('backend/images/bromo/').$input['images_all']);
                    $input_upload_image[$key] = $input['images_all'];
                }
                $input['body'] = json_encode($input['images_all']);
            }
            $bromo = $this->bromo->find($id)->update($input);

            if ($bromo) {
                $message_title="Berhasil !";
                $message_content="Paket Bromo Berhasil Diupdate";
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

    public function b_bromo_list(Request $request, $id)
    {
        $data['bromo'] = $this->bromo->find($id);
        if (empty($data['bromo'])) {
            return redirect()->back();
        }

        if ($request->ajax()) {
            $data_list = $data['bromo']->bromo_list;
            return DataTables::of($data_list)
                    ->addIndexColumn()
                    ->addColumn('price', function($row){
                        return 'Rp. '.number_format($row->price,0,',','.');
                    })
                    ->addColumn('action', function($row){
                        $btn = '<div class="btn-group">';
                        $btn .=     '<button class="btn btn-warning" onclick="edit(`'.$row->id.'`)">Edit</button>';
                        $btn .=     '<button class="btn btn-danger" onclick="hapus(`'.$row->id.'`)">Delete</button>';
                        $btn .= '</div>';
                        return $btn;
                    })
                    ->rawColumns(['action','data_bromo'])
                    ->make(true);
        }

        return view('backend.paket_wisata.bromo.list.index',$data);
    }

    public function b_bromo_list_simpan(Request $request,$id)
    {
        $rules = [
            'departure_date'  => 'required',
            'quota'  => 'required',
            'max_quota'  => 'required',
            'price'  => 'required',
            'discount'  => 'required',
        ];

        $messages = [
            'departure_date.required'   => 'Tanggal Berangkat wajib diisi.',
            'quota.required'   => 'Kuota wajib diisi.',
            'max_quota.required'  => 'Maksimal Kuota wajib diisi.',
            'price.required'   => 'Harga wajib diisi.',
            'discount.required'   => 'Diskon wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()){
            $input = $request->all();
            $input['id'] = Str::uuid()->toString();
            $input['bromo_id'] = $id;

            $bromo_list = $this->bromo_list->create($input);

            if ($bromo_list) {
                $message_title="Berhasil !";
                $message_content="Paket Bromo Berhasil Dibuat";
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

    public function b_bromo_list_edit($id,$id_bromo)
    {
        $data = $this->bromo_list->where('id',$id_bromo)
                                ->where('bromo_id',$id)
                                ->first();
        if (empty($data)) {
            return [
                'success' => false,
                'message_title' => 'Data tidak ditemukan'
            ];
        }

        return [
            'success' => true,
            'data' => $data
        ];
    }

    public function b_bromo_list_update(Request $request,$id,$id_bromo)
    {
        $rules = [
            'edit_departure_date'  => 'required',
            'edit_quota'  => 'required',
            'edit_max_quota'  => 'required',
            'edit_price'  => 'required',
            'edit_discount'  => 'required',
        ];

        $messages = [
            'edit_departure_date.required'   => 'Tanggal Berangkat wajib diisi.',
            'edit_quota.required'   => 'Kuota wajib diisi.',
            'edit_max_quota.required'  => 'Maksimal Kuota wajib diisi.',
            'edit_price.required'   => 'Harga wajib diisi.',
            'edit_discount.required'   => 'Diskon wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()){
            $bromo_list = $this->bromo_list->where('id',$id_bromo)->where('bromo_id',$id)->first();
            $input['bromo_id'] = $id;
            $input['departure_date'] = $request->edit_departure_date;
            $input['quota'] = $request->edit_quota;
            $input['max_quota'] = $request->edit_max_quota;
            $input['price'] = $request->edit_price;
            $input['discount'] = $request->edit_discount;

            $bromo_list->update($input);

            if ($bromo_list) {
                $message_title="Berhasil !";
                $message_content="Paket Bromo Berhasil Diupdate";
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

    public function b_bromo_list_delete($id,$id_bromo)
    {
        $data = $this->bromo_list->where('id',$id_bromo)
                                ->where('bromo_id',$id)
                                ->first();
        if (empty($data)) {
            return [
                'success' => false,
                'message_title' => 'Data tidak ditemukan'
            ];
        }

        $data->delete();

        return [
            'success' => true,
            'message_title' => 'Berhasil',
            'message_content' => 'Paket List Bromo Berhasil Dihapus'
        ];
    }

    public function b_upload_image(Request $request)
    {
        $path = public_path('backend/images/bromo');
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }

        if ($request->file('file')) {
            $image_bromo = $request->file('file');
            $img_image_bromo = \Image::make($image_bromo->path());
            $img_image_bromo = $img_image_bromo->encode('webp',65);
            $inputImageBromo = 'ImageBromo-waiting-'.time().'.webp';
            $img_image_bromo->save(public_path('backend/images/bromo/').$inputImageBromo);
        }

        return response()->json([
            'success' => true
        ]);
    }

    public function b_reupload_simpan(Request $request)
    {
        $bromo = $this->bromo->find($request->reupload_id);

        $input['id'] = Str::uuid()->toString();
        $input['tanggal'] = $request->reupload_tanggal;
        $input['title'] = $request->reupload_title;
        $input['slug'] = Str::slug($request->reupload_title);
        $input['meeting_point'] = $request->reupload_meeting_point;
        $input['category_trip'] = $request->reupload_category_trip;
        $input['quota'] = $request->reupload_quota;
        $input['max_quota'] = $request->reupload_max_quota;
        $input['destination'] = $bromo->destination;
        $input['include'] = $bromo->include;
        $input['exclude'] = $bromo->exclude;
        $input['price'] = $request->reupload_price;
        $input['discount'] = $request->reupload_discount;

        $reupload = $this->bromo->create($input);

        if ($reupload) {
            $message_title="Berhasil !";
            $message_content="Paket Travelling ".$request->title." Berhasil Dibuat";
            $message_type="success";
            $message_succes = true;
        }

        $array_message = array(
            'success' => $message_succes,
            'message_title' => $message_title,
            'message_content' => $message_content,
            'message_type' => $message_type,
        );

        return response()->json($array_message);
    }
}
