<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Payment\TripayController;
use App\Models\User;
use App\Models\Slider;
use App\Models\Bromo;
use App\Models\BromoList;
use App\Models\Transactions;
use \Carbon\Carbon;

use Mail;
use DB;

class FrontendController extends Controller
{
    function __construct(
        TripayController $tripay,
        Transactions $transactions,
        Slider $slider,
        Bromo $bromo,
        BromoList $bromo_list
    )
    {
        $this->tripay = $tripay;
        $this->slider = $slider;
        $this->bromo = $bromo;
        $this->bromo_list = $bromo_list;
        $this->transactions = $transactions;
        $this->addDay = 0;
    }
    public function index()
    {
        $data['sliders'] = $this->slider->where('status','Y')->orderBy('created_at','desc')->get();
        return view('frontend.index',$data);
    }

    public function about()
    {
        return view('frontend.aboutus');
    }

    public function contact()
    {
        return view('frontend.contactus');
    }

    public function contact_send_mail(Request $request)
    {
        // dd($request->all());
        $datas = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'number' => $request->number,
            'message' => $request->message,
        ];

        $send_mail = Mail::mailer('contact')->to('contact@plesiranindonesia.com')
        ->send(new \App\Mail\ContactUs($datas));

        return response()->json([
            'success' => true,
            'message_title' => 'Berhasil',
            'message_content' => 'Terimakasih telah menghubungi kami'
        ]);
    }

    public function kebijakan_privasi()
    {
        return view('frontend.kebijakan_privasi');
    }

    public function bromo()
    {
        $data['bromos'] = $this->bromo->all();
        return view('frontend.bromo.index',$data);
    }

    public function bromo_list($id)
    {
        $data['bromo'] = $this->bromo->find($id);
        if(empty($data['bromo'])){
            return redirect()->back();
        }
        return view('frontend.bromo.list',$data);
    }

    public function bromo_checkout($id,$id_list)
    {
        $tanggal_live = Carbon::now()->addDay($this->addDay);
        // dd($tanggal_live);
        $data['bromo'] = $this->bromo_list->where('id',$id_list)->where('bromo_id',$id)
                                    ->whereDate('departure_date','>=',$tanggal_live->format('Y-m-d'))
                                    ->whereTime('departure_date','>=',$tanggal_live->format('H:i:s'))
                                    ->first();
        // dd($data);
        if (empty($data['bromo'])) {
            return redirect()->back();
        };
        $tripay = $this->tripay;
        $data['channels'] = json_decode($tripay->getPayment())->data;
        return view('frontend.bromo.checkout',$data);
    }

    public function bromo_payment(Request $request, $id,$id_list)
    {
        $tanggal_live = Carbon::now()->addDay($this->addDay);
        $bromo = $this->bromo_list->where('id',$id_list)->where('bromo_id',$id)
                                ->whereDate('departure_date','>=',$tanggal_live->format('Y-m-d'))
                                ->whereTime('departure_date','>=',$tanggal_live->format('H:i:s'))
                                ->first();
        $kode_jenis_transaksi = 'TRX-BRMO';
        $kode_random_transaksi = Carbon::now()->format('Ym').rand(100,999);
        $input['id'] = Str::uuid()->toString();
        $input['transaction_code'] = $kode_jenis_transaksi.'-'.$kode_random_transaksi;
        $input['transaction_unit'] = $bromo->bromo->title.' - Departure Date '.$bromo->departure_date;
        $transaction_price = $bromo->category_trip == 'Publik' ? ($bromo->price - (($bromo->discount/100) * $bromo->price)) * $request->qty : $bromo->price - (($bromo->discount/100) * $bromo->price);
        $input['transaction_billing'] = json_encode([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->alamat,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        $input['transaction_order'] = json_encode(
            [
                [
                    'item' => $input['transaction_unit'],
                    'price' => $bromo->price,
                    'qty' => $request->qty,
                ]
            ]
        );
        if($request->qty == 0 and $request->qty == null){
            $input['transaction_qty'] = 1;
        }else{
            $input['transaction_qty'] = $request->qty;
        }
        $input['transaction_price'] = $transaction_price;
        if (auth()->user()) {
            $input['user'] = auth()->user()->generate;
        }else{
            $input['user'] = null;
        }
        $input['status'] = 'Unpaid';
        $tripay = $this->tripay;
        $paymentDetail = $tripay->requestTransaction(
            $input['transaction_unit'],
            $request->method,$input['transaction_price'],
            $request->first_name,$request->last_name,$request->email,$request->phone,
            $input['transaction_code'],null
            // route('frontend.bromo.f_reservasi_invoice',['transaction_code' => $input['transaction_code']])
        );
        $input['transaction_reference'] = json_decode($paymentDetail)->data->reference;
        $transactions = $this->transactions->create($input);
        $bromo->quota = $bromo->quota - $input['transaction_qty'];
        $bromo->update();
        DB::commit();

        if ($transactions) {
            // $user = $this->user->where('role',1)->get();
            // $notif = [
            //     'id' => $input['id'],
            //     'url' => route('b.invoice.detail',$input['transaction_code']),
            //     'title' => $input['transaction_unit'],
            //     'message' => 'Pesanan Baru - Sedang Melakukan Pembayaran',
            //     'color_icon' => 'warning',
            //     'icon' => 'uil-clipboard-alt',
            //     'publish' => $transactions->created_at,
            // ];
            // Notification::send($user,new NotificationNotif($notif));
            return redirect(json_decode($paymentDetail)->data->checkout_url);
        }
        // DB::beginTransaction();
        // try {
        //     $tanggal_live = Carbon::now()->addDay($this->addDay);
        //     $bromo = $this->bromo->where('id',$id)
        //                         ->whereDate('tanggal','>=',$tanggal_live->format('Y-m-d'))
        //                         ->whereTime('tanggal','>=',$tanggal_live->format('H:i:s'))
        //                         ->first();
        //     $kode_jenis_transaksi = 'TRX-BRMO';
        //     $kode_random_transaksi = Carbon::now()->format('Ym').rand(100,999);
        //     $input['id'] = Str::uuid()->toString();
        //     $input['transaction_code'] = $kode_jenis_transaksi.'-'.$kode_random_transaksi;
        //     $input['transaction_unit'] = $bromo->title.' - Departure Date '.$bromo->tanggal;
        //     $transaction_price = $bromo->category_trip == 'Publik' ? ($bromo->price - (($bromo->discount/100) * $bromo->price)) * $request->qty : $bromo->price - (($bromo->discount/100) * $bromo->price);
        //     $input['transaction_order'] = json_encode([
        //         'first_name' => $request->first_name,
        //         'last_name' => $request->last_name,
        //         'address' => $request->alamat,
        //         'email' => $request->email,
        //         'phone' => $request->phone,
        //     ]);
        //     if($request->qty == 0 and $request->qty == null){
        //         $input['transaction_qty'] = 1;
        //     }else{
        //         $input['transaction_qty'] = $request->qty;
        //     }
        //     $input['transaction_price'] = $transaction_price;
        //     if (auth()->user()) {
        //         $input['user'] = auth()->user()->generate;
        //     }else{
        //         $input['user'] = null;
        //     }
        //     $input['status'] = 'Unpaid';
        //     $tripay = $this->tripay;
        //     $paymentDetail = $tripay->requestTransaction(
        //         $bromo->title,
        //         $request->method,$input['transaction_price'],
        //         $request->first_name,$request->last_name,$request->email,$request->phone,
        //         $input['transaction_code'],
        //         route('frontend.bromo.f_reservasi_invoice',['transaction_code' => $input['transaction_code']])
        //     );
        //     $input['transaction_reference'] = json_decode($paymentDetail)->data->reference;
        //     $transactions = $this->transactions->create($input);
        //     $bromo->quota = $bromo->quota - $input['transaction_qty'];
        //     $bromo->update();
        //     DB::commit();

        //     if ($transactions) {
        //         // $user = $this->user->where('role',1)->get();
        //         // $notif = [
        //         //     'id' => $input['id'],
        //         //     'url' => route('b.invoice.detail',$input['transaction_code']),
        //         //     'title' => $input['transaction_unit'],
        //         //     'message' => 'Pesanan Baru - Sedang Melakukan Pembayaran',
        //         //     'color_icon' => 'warning',
        //         //     'icon' => 'uil-clipboard-alt',
        //         //     'publish' => $transactions->created_at,
        //         // ];
        //         // Notification::send($user,new NotificationNotif($notif));
        //         return redirect(json_decode($paymentDetail)->data->checkout_url);
        //     }
        // } catch (\Throwable $th) {
        //     DB::rollback();
        //     return redirect()->back()->with('error','Payment Gagal');
        // }
    }
}
