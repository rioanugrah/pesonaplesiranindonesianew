<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
// use App\Http\Controllers\Payment\TripayController;
use App\Http\Controllers\v1\TransactionController;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Bromo;
use \Carbon\Carbon;
use \Carbon\CarbonPeriod;

use DataTables;
use Notification;
use Validator;
use DB;

class BromoController extends Controller
{
    function __construct(
        TransactionController $transaction,
        Bromo $bromo
    )
    {
        $this->transaction = $transaction;
        $this->bromo = $bromo;
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

            $input['transaction_order'] = json_encode([
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
                    ->addColumn('status', function($row){
                        // return 'Rp. '.number_format($row->price,0,',','.');
                        if ($row->tanggal >= Carbon::now()) {
                            $status = '<span class="badge bg-success">OPEN</span>';
                        }else{
                            $status = '<span class="badge bg-danger">CLOSED</span>';
                        }
                        return $status;
                    })
                    ->addColumn('price', function($row){
                        return 'Rp. '.number_format($row->price,0,',','.');
                    })
                    ->addColumn('action', function($row){
                        $btn = '<div class="btn-group">';
                        $btn .= '<button onclick="reupload(`'.$row->id.'`)" class="btn btn-info btn-xs"><i class="fas fa-file"></i> Re-upload</button>';
                        // $btn .= '<a href='.route('tour.edit',['id' => $row->id]).' class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>';
                        // $btn .= '<button onclick="hapus(`'.$row->id.'`)" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>';
                        $btn .= '</div>';
                        return $btn;
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
        }

        return view('backend.paket_wisata.bromo.index');
    }

    public function b_simpan(Request $request)
    {
        $rules = [
            'tanggal'  => 'required',
            'title'  => 'required',
            'meeting_point'  => 'required',
            'category_trip'  => 'required',
            'quota'  => 'required',
            'max_quota'  => 'required',
            'price'  => 'required',
            'discount'  => 'required',
            'group_destination'  => 'required',
            'group_include'  => 'required',
            'group_exclude'  => 'required',
        ];

        $messages = [
            'tanggal.required'   => 'Tanggal Dibuat wajib diisi.',
            'title.required'   => 'Judul wajib diisi.',
            'meeting_point.required'   => 'Meeting Point wajib diisi.',
            'category_trip.required'  => 'Kategori Trip wajib diisi.',
            'quota.required'   => 'Kuota wajib diisi.',
            'max_quota.required'   => 'Maksimal Kuota wajib diisi.',
            'price.required'   => 'Harga wajib diisi.',
            'discount.required'   => 'Diskon wajib diisi.',
            'group_destination.required'   => 'Destination wajib diisi.',
            'group_include.required'   => 'Include wajib diisi.',
            'group_exlude.required'   => 'Exclude wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->passes()) {
            $input['id'] = Str::uuid()->toString();
            $input['slug'] = Str::slug($request->title);
            $input['tanggal'] = $request->tanggal;
            $input['title'] = $request->title;
            $input['meeting_point'] = $request->meeting_point;
            $input['category_trip'] = $request->category_trip;
            $input['quota'] = $request->quota;
            $input['max_quota'] = $request->max_quota;
            $input['destination'] = json_encode($request->group_destination);
            $input['include'] = json_encode($request->group_include);
            $input['exclude'] = json_encode($request->group_exclude);
            $input['price'] = $request->price;
            $input['discount'] = $request->discount;

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
