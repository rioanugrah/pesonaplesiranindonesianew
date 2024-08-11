<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Payment\TripayController;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use \App\Models\Transactions;
// use App\Models\Roles;

use DataTables;
use Validator;
use DB;
use File;
use PDF;
use \Carbon\Carbon;

class TransactionController extends Controller
{
    function __construct(
        TripayController $tripay,
        Transactions $transaction
    )
    {
        $this->tripay_payment = $tripay;
        $this->transaction = $transaction;
        // $this->middleware('permission:transaksi-list', ['only' => ['index']]);
        // $this->middleware('permission:posting-create', ['only' => ['create']]);
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if (auth()->user()->getRoleNames()->first() == 'Administrator') {
                $data = $this->transaction->orderBy('created_at','desc')->get();
            }else{
                $data = $this->transaction->where('user',auth()->user()->generate)->orderBy('created_at','desc')->get();
            }
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('nama_order', function($row){
                        return ucwords($row->transaction_unit);
                    })
                    ->addColumn('kode_order', function($row){
                        if($row->status == 'Unpaid'){
                            // return '<span class="badge bg-warning"><i class="uil-postcard"></i> '.strtoupper($row->status).'</span>';
                            return $row->transaction_code.' <span class="badge bg-warning"><i class="uil-postcard"></i> '.strtoupper($row->status).'</span>'.'<br>'.'<span style="font-size:9pt">'.$row->created_at->isoFormat('LLLL').'</span>';
                        }elseif($row->status == 'Paid'){
                            // return '<span class="badge bg-success"><i class="uil-check-circle"></i> '.strtoupper($row->status).'</span>';
                            return $row->transaction_code.' <span class="badge bg-success"><i class="uil-check-circle"></i> '.strtoupper($row->status).'</span>'.'<br>'.'<span style="font-size:9pt">'.$row->created_at->isoFormat('LLLL').'</span>';
                        }elseif($row->status == 'Not Paid'){
                            // return '<span class="badge bg-danger"><i class="uil-times-circle"></i> '.strtoupper($row->status).'</span>';
                            return $row->transaction_code.' <span class="badge bg-danger"><i class="uil-times-circle"></i> '.strtoupper($row->status).'</span>'.'<br>'.'<span style="font-size:9pt">'.$row->created_at->isoFormat('LLLL').'</span>';
                        }
                        // return $row->kode_order.'<br>'.'<span style="font-size:9pt">'.$row->created_at->isoFormat('LLLL').'</span>';
                        // return $row->created_at->isoFormat('LLLL');
                    })
                    ->addColumn('created_at', function($row){
                        return $row->created_at;
                    })
                    ->addColumn('price', function($row){
                        return 'Rp. '.number_format($row->transaction_price,2,",",".");
                    })
                    ->addColumn('pemesan', function($row){
                        // $pemesan = json_decode($row->transaction_order);
                        // $card = '';
                        // $card .= '<div class="d-flex align-items-start">';
                        // $card .=    '<div class="flex-grow-1 align-self-center">';
                        // $card .=        '<p class="mb-2">Nama</p>';
                        // $card .=        '<h6 class="mb-0">'.'1. '.$pemesan->first_name.' '.$pemesan->last_name.'</h6>';
                        // $card .=        '<p class="mb-2 mt-3">No.Telp / Whatsapp</p>';
                        // $card .=        '<h6 class="mb-0">'.'2. '.$pemesan->phone.'</h6>';
                        // $card .=    '</div>';
                        // $card .= '</div>';

                        // return $card;
                        return $row->users->name;
                    })
                    ->addColumn('qty', function($row){
                        return $row->transaction_qty;
                    })
                    // ->addColumn('status', function($row){
                    //     if($row->status == 'Unpaid'){
                    //         return '<span class="badge bg-warning"><i class="uil-postcard"></i> '.strtoupper($row->status).'</span>';
                    //     }elseif($row->status == 'Paid'){
                    //         return '<span class="badge bg-success"><i class="uil-check-circle"></i> '.strtoupper($row->status).'</span>';
                    //     }elseif($row->status == 'Not Paid'){
                    //         return '<span class="badge bg-danger"><i class="uil-times-circle"></i> '.strtoupper($row->status).'</span>';
                    //     }
                    // })
                    ->addColumn('action', function($row){
                        $btn = '<div class="btn-group">';
                        $btn .= '<a href='.route('b.transaction.detail',['id' => $row->id]).' target="_blank" class="btn btn-xs btn-success"><i class="uil-file-alt"></i> Detail</a>';
                        $btn .= '<a href='.route('b.transaction.invoice',['id' => $row->id]).' target="_blank" class="btn btn-xs btn-primary"><i class="uil-file-alt"></i> Invoice</a>';
                        $btn .= '</div>';
                        return $btn;
                    })
                    ->rawColumns(['action','pemesan','kode_order'])
                    ->make(true);
        }
        return view('backend.transaction.index');
    }

    public function detail($id)
    {
        $data['transaction'] = $this->transaction->find($id);
        if (empty($data['transaction'])) {
            return redirect()->back();
        }
        return view('backend.transaction.detail',$data);
    }

    public function invoice($id)
    {
        $data['transaction'] = $this->transaction->find($id);
        if (empty($data['transaction'])) {
            return redirect()->back();
        }
        return view('backend.transaction.invoice',$data);
    }

    public function transaction(
        $transaction_code,
        $transaction_unit,
        $transaction_order,
        $transaction_qty,
        $transaction_price,
        $billing_first_name,
        $billing_last_name,
        $billing_email,
        $billing_phone,
        $payment_method,
        $status
    )
    {
        $input['id'] = Str::uuid()->toString();
        $payment = $this->tripay_payment->requestTransaction(
            $transaction_unit,
            $payment_method,
            $transaction_price,
            $billing_first_name,
            $billing_last_name,
            $billing_email,
            $billing_phone,
            $transaction_code,
            redirect()->route('b.transaction.invoice',['id' => $input['id']])
        );

        // dd($payment);
        $input['transaction_code'] = $transaction_code;
        $input['transaction_reference'] = json_decode($payment)->data->reference;
        $input['transaction_unit'] = $transaction_unit;
        $input['transaction_order'] = $transaction_order;
        $input['transaction_qty'] = $transaction_qty;
        $input['transaction_price'] = $transaction_price;
        $input['user'] = auth()->user()->generate;
        $input['link_payment'] = json_decode($payment)->data->checkout_url;
        $input['status'] = $status;

        if ($payment) {
            $transaction = $this->transaction->create($input);
            if ($transaction) {
                return response()->json([
                    'success' => true,
                    'message_title' => 'Success',
                    'message_content' => 'Transaction Success'
                ]);
            }
            return response()->json([
                'success' => false,
                'message_title' => 'Failed',
                'message_content' => 'Transaction Unsuccess'
            ]);
        }

        return response()->json([
            'success' => false,
            'message_title' => 'Failed',
            'message_content' => 'Transaction Unsuccess'
        ]);
    }

    // public function detail_bukti_pembayaran($kode_transaksi)
    // {
    //     $bukti_pembayaran = BuktiPembayaran::where('kode_transaksi',$kode_transaksi)->first();
    //     if(empty($bukti_pembayaran)){
    //         return response()->json([
    //             'success' => false,
    //             'message_title' => 'Data tidak ditemukan'
    //         ]);
    //     }
    //     return response()->json([
    //         'success' => true,
    //         'data' => [
    //             'id' => $bukti_pembayaran->id,
    //             'kode_transaksi' => $bukti_pembayaran->kode_transaksi,
    //             'images' => asset('bukti_pembayaran/'.$bukti_pembayaran->images),
    //         ]
    //     ]);
    // }

    // public function bukti_pembayaran_simpan(Request $request)
    // {
    //     $transaction = Transactions::where('transaction_code',$request->bukti_pembayaran_kode_transaksi)->first();
    //     if (empty($transaction)) {
    //         return response()->json([
    //             'success' => false,
    //             'message_title' => 'Data tidak ditemukan'
    //         ]);
    //     }
    //     $transaction->update([
    //         'status' => $request->bukti_pembayaran_status
    //     ]);
    //     $verifikasi_tiket = VerifikasiTiket::where('transaction_id',$transaction->id)->update([
    //         'status' => $request->bukti_pembayaran_status
    //     ]);

    //     return response()->json([
    //         'success' => true,
    //         'message_content' => 'Bukti Pembayaran Berhasil'
    //     ]);
    // }
}
