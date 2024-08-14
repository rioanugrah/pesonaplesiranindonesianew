<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Payment\TripayController;

use App\Models\Transactions;
use App\Models\CampingCampers;
use App\Models\CampingCategory;
use App\Models\CampingOrder;
use App\Models\CampingPricelist;
use App\Models\CampingReservation;
use App\Models\CampingReturn;

use \Carbon\Carbon;
use DataTables;
use Notification;
use Validator;
use DB;
use File;

class CampingController extends Controller
{
    function __construct(
        TripayController $tripay,
        Transactions $transaction,
        CampingCampers $camping_campers,
        CampingCategory $camping_category,
        CampingOrder $camping_order,
        CampingPricelist $camping_pricelist,
        CampingReservation $camping_reservation,
        CampingReturn $camping_return
    )
    {
        $this->tripay_payment = $tripay;
        $this->transaction = $transaction;
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

    public function camping_reservation_index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->camping_reservation->all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('camping_campers_id', function($row){
                        return $row->camping_campers->first_name.' '.$row->camping_campers->last_name;
                    })
                    ->addColumn('resv_date', function($row){
                        return Carbon::create($row->resv_date)->isoFormat('dddd, DD MMMM YYYY');
                    })
                    ->addColumn('resv_night', function($row){
                        return $row->resv_night.' Malam';
                    })
                    ->addColumn('resv_return', function($row){
                        return Carbon::create($row->resv_date)->addDay($row->resv_night+1)->isoFormat('dddd, DD MMMM YYYY');
                    })
                    ->addColumn('status', function($row){
                        // return $row->camping_orders;

                        if (empty($row->camping_orders->transactions)) {
                            return '<span class="badge bg-danger">NON FOUND</span>';
                        }else{
                            switch ($row->camping_orders->transactions->status) {
                                case 'Paid':
                                    return '<span class="badge bg-info">Reservation</span>';
                                    break;
                                case 'Unpaid':
                                    return '<span class="badge bg-warning">Waiting Payment</span>';
                                    break;
                                default:
                                    # code...
                                    break;
                            }
                        }


                        // switch ($row->status) {
                        //     case 'Waiting':
                        //         return '<span class="badge bg-warning">Waiting Payment</span>';
                        //         break;

                        //     case 'Reservation':
                        //         return '<span class="badge bg-info">Reservation</span>';
                        //         break;

                        //     case 'Non Aktif':
                        //         return '<span class="badge bg-danger">Non Aktif</span>';
                        //         break;

                        //     default:
                        //         # code...
                        //         break;
                        // }
                    })
                    ->addColumn('action', function($row){
                        $revs_return_date = Carbon::create($row->resv_date)->addDay($row->resv_night+1)->format('Ymd');
                        $live_date = Carbon::now()->format('Ymd');
                        // dd(strtotime($revs_return_date),strtotime($live_date));
                        $btn = '<div class="btn-group">';
                        if (strtotime($revs_return_date) === strtotime($live_date)) {
                            $btn .= '<a href="javascript:void(0)" onclick="edit(`'.$row->id.'`)" class="btn btn-xs btn-purple"><i class="uil-edit"></i> Retur</a>';
                        }
                        // $btn .= '<a href="javascript:void(0)" onclick="edit(`'.$row->id.'`)" class="btn btn-xs btn-warning"><i class="uil-edit"></i> Edit</a>';
                        // $btn .= '<a href="javascript:void(0)" onclick="hapus(`'.$row->id.'`)" class="btn btn-xs btn-danger"><i class="uil-trash"></i> Delete</a>';
                        $btn .= '</div>';
                        return $btn;
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
        }
        return view('backend.campings.reservations.index');
    }

    public function camping_reservation_create()
    {
        $data['camping_categories'] = $this->camping_category->all();
        $tripay = $this->tripay_payment;
        $data['channels'] = json_decode($tripay->getPayment())->data;
        return view('backend.campings.reservations.create',$data);
    }

    public function camping_reservation_simpan(Request $request)
    {
        $rules = [
            'first_name'  => 'required',
            'last_name'  => 'required',
            'email'  => 'required',
            'no_telp'  => 'required',
            'address'  => 'required',
            'city'  => 'required',
            'state'  => 'required',
            'foto_identitas'  => 'required',
            'resv_date'  => 'required',
            'resv_night'  => 'required',
            'order'  => 'required',
        ];

        $messages = [
            'first_name.required'   => 'First Name wajib diisi.',
            'last_name.required'   => 'Last Name wajib diisi.',
            'email.required'   => 'Email wajib diisi.',
            'no_telp.required'   => 'No.Telp wajib diisi.',
            'address.required'   => 'Alamat wajib diisi.',
            'city.required'   => 'Kota / Kabupaten wajib diisi.',
            'state.required'   => 'Provinsi wajib diisi.',
            'foto_identitas.required'   => 'Foto Identitas wajib diisi.',
            'resv_date.required'   => 'Tanggal Reservasi wajib diisi.',
            'resv_night.required'   => 'Durasi Reservasi wajib diisi.',
            'order.required'   => 'Order Item wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        DB::beginTransaction();
        if ($validator->passes()) {
            $path = public_path('berkas_camping/berkas');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            $input_identitas['id'] = Str::uuid()->toString();
            $input_identitas['first_name'] = $request->first_name;
            $input_identitas['last_name'] = $request->last_name;
            $input_identitas['email'] = $request->email;
            $input_identitas['no_telp'] = $request->no_telp;
            $input_identitas['address'] = $request->address;
            $input_identitas['city'] = $request->city;
            $input_identitas['state'] = $request->state;
            if ($request->file('foto_identitas')) {
                $image_foto_identitas = $request->file('foto_identitas');
                $img_foto_identitas = \Image::make($image_foto_identitas->path());
                $img_foto_identitas = $img_foto_identitas->encode('webp',75);
                $input_identitas['foto_identitas'] = 'Identitas_'.$input_identitas['first_name'].'_'.time().'.webp';
                $img_foto_identitas->save(public_path('berkas_camping/berkas/').$input_identitas['foto_identitas']);
            }

            $input_reservation['id'] = Str::uuid()->toString();
            $input_reservation['camping_campers_id'] = $input_identitas['id'];
            $input_reservation['resv_date'] = $request->resv_date;
            $input_reservation['resv_night'] = $request->resv_night;
            $input_reservation['status'] = 'Waiting';

            $input_order['id'] = Str::uuid()->toString();
            $input_order['camping_reservation_id'] = $input_reservation['id'];
            $input_order['kode_order'] = 'CMP-'.Carbon::now()->format('Ymd').rand(100,999);
            $total = [];
            $totalqty = [];
            foreach ($request->order as $key => $order) {
                // $items[] = $order['item'];
                $camping_pricelist = $this->camping_pricelist->find($order['item']);
                if ($camping_pricelist->stock == 0) {
                    return response()->json([
                        'success' => false,
                        'error' => 'Stock '.$camping_pricelist->nama_barang.' Habis'
                    ]);
                }
                $items[] = [
                    'name_product' => $camping_pricelist->nama_barang,
                    'price' => $camping_pricelist->price,
                    'qty' => $order['qty']
                ];
                array_push($total,$camping_pricelist->price*$order['qty']);
                array_push($totalqty,$order['qty']);
                $jumlah_order = $camping_pricelist->stock - $order['qty'];
                $camping_pricelist->update([
                    'stock' => $jumlah_order
                ]);
            }
            $input_order['order'] = json_encode($items);
            $input_order['total'] = array_sum($total);
            $input_order['status'] = 'Unpaid';

            if($input_identitas && $input_reservation && $input_order){
                $camping_campers = $this->camping_campers->create($input_identitas);
                $camping_reservation = $this->camping_reservation->create($input_reservation);
                $camping_order = $this->camping_order->create($input_order);

                if ($camping_campers && $camping_reservation && $camping_order) {
                    $input['transaction_order'] = json_encode([
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'address' => $request->alamat,
                        'email' => $request->email,
                        'phone' => $request->no_telp,
                    ]);

                    $inputIDTransaction = Str::uuid()->toString();

                    // dd(url('b/transaction/').$inputIDTransaction.'/invoice');

                    $payment = $this->tripay_payment->requestTransaction(
                        'Pemesanan Camping - '.$input_order['kode_order'],
                        $request->method,
                        array_sum($total),
                        $request->first_name,
                        $request->last_name,
                        $request->email,
                        $request->no_telp,
                        $input_order['kode_order'],
                        url('b/transaction/').'/'.$inputIDTransaction.'/invoice'
                    );

                    $this->transaction->create([
                        'id' => $inputIDTransaction,
                        'transaction_code' => $input_order['kode_order'],
                        'transaction_reference' => json_decode($payment)->data->reference,
                        'transaction_unit' => 'Pemesanan Camping - '.$input_order['kode_order'],
                        'transaction_order' => $input['transaction_order'],
                        'transaction_qty' => array_sum($totalqty),
                        'transaction_price' => array_sum($total),
                        'user' => auth()->user()->generate,
                        'link_payment' => json_decode($payment)->data->checkout_url,
                        'status' => 'Unpaid'
                    ]);

                    // $transaction = $this->transaction->transaction(
                    //     $input_order['kode_order'],
                    //     'Pemesanan Camping - '.$input_order['kode_order'],
                    //     $input['transaction_order'],
                    //     array_sum($totalqty),
                    //     array_sum($total),
                    //     $request->first_name,
                    //     $request->last_name,
                    //     $request->email,
                    //     $request->no_telp,
                    //     $request->method,
                    //     'Unpaid'
                    // );

                    $message_title="Berhasil !";
                    $message_content='Pemesanan Camping - '.$input_order['kode_order']." Berhasil Dibuat. Silahkan tunggu untuk buat proses pembayaran";
                    $message_type="success";
                    $message_succes = true;
                    $link_payment = json_decode($payment)->data->checkout_url;
                }
            }

            $array_message = array(
                'success' => $message_succes,
                'message_title' => $message_title,
                'message_content' => $message_content,
                'message_type' => $message_type,
                'link_payment' => $link_payment,
            );

            DB::commit();
            return $array_message;
            // dd($input_identitas,$input_reservation,$input_order);
        }
        DB::rollback();
        return response()->json([
            'success' => false,
            'error' => $validator->errors()->all()
        ]);
    }

    public function camping_orders_index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->camping_order->all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('kode_order', function($row){
                        return '<span class="badge bg-purple">'.$row->kode_order.'</span>'.'<br>'.$row->created_at->isoFormat('LLLL');
                        // return $row->camping_campers->first_name.' '.$row->camping_campers->last_name;
                    })
                    ->addColumn('camping_reservation_id', function($row){
                        return $row->camping_reservation->camping_campers->first_name.' '.$row->camping_reservation->camping_campers->last_name;
                        // return $row->camping_campers->first_name.' '.$row->camping_campers->last_name;
                    })
                    ->addColumn('total', function($row){
                        return 'Rp. '.number_format($row->total,0,',','.');
                        // return $row->camping_campers->first_name.' '.$row->camping_campers->last_name;
                    })
                    ->addColumn('status', function($row){
                        // return empty($row->transactions ?);
                        if (empty($row->transactions)) {
                            return '<span class="badge bg-danger">NON FOUND</span>';
                        }else{
                            switch ($row->transactions->status) {
                                case 'Paid':
                                    return '<span class="badge bg-success">PAID</span>';
                                    break;
                                case 'Unpaid':
                                    return '<span class="badge bg-warning">UNPAID</span>';
                                    break;
                                default:
                                    # code...
                                    break;
                            }
                        }
                    })
                    ->addColumn('action', function($row){
                        $btn = '<div class="btn-group">';
                        if (!empty($row->transactions)) {
                            $btn .= '<a href="javascript:void(0)" onclick="detail(`'.$row->id.'`)" class="btn btn-xs btn-success"><i class="uil-eye"></i> Detail</a>';
                        }
                        // $btn .= '<a href="javascript:void(0)" onclick="edit(`'.$row->id.'`)" class="btn btn-xs btn-warning"><i class="uil-edit"></i> Edit</a>';
                        // $btn .= '<a href="javascript:void(0)" onclick="hapus(`'.$row->id.'`)" class="btn btn-xs btn-danger"><i class="uil-trash"></i> Delete</a>';
                        $btn .= '</div>';
                        return $btn;
                    })
                    ->rawColumns(['kode_order','action','status'])
                    ->make(true);
        }
        return view('backend.campings.orders.index');
    }
}
