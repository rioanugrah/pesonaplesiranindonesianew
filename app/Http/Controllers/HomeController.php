<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;

use \Carbon\Carbon;
use Carbon\CarbonPeriod;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        Transactions $transaction
    )
    {
        $this->transaction = $transaction;
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $date = Carbon::now();

        $year_start = $date->startOfYear()->format('Y-m');
        $year_end = $date->endOfYear()->format('Y-m');

        $years = CarbonPeriod::create($year_start, $year_end)->month();

        if (auth()->user()->getRoleNames()[0] == 'Administrator') {
            $data['total_penjualan_year'] = $this->transaction->whereYear('created_at',Carbon::now())->sum('transaction_price');
            $data['total_penjualan_month'] = $this->transaction->whereMonth('created_at',Carbon::now())->sum('transaction_price');
            foreach ($years as $key => $value) {
                $data['sum_penjualan_month'][] = $this->transaction->where('created_at','like','%'.$value->format('Y-m').'%')->sum('transaction_price');
                $data['years'][] = $value->format('m-Y');
            }
        }else{
            $data['total_penjualan_year'] = $this->transaction->whereYear('created_at',Carbon::now())->where('user',auth()->user()->generate)->sum('transaction_price');
            $data['total_penjualan_month'] = $this->transaction->whereMonth('created_at',Carbon::now())->where('user',auth()->user()->generate)->sum('transaction_price');
            foreach ($years as $key => $value) {
                $data['sum_penjualan_month'][] = $this->transaction->where('created_at','like','%'.$value->format('Y-m').'%')->where('user',auth()->user()->generate)->sum('transaction_price');
                $data['years'][] = $value->format('m-Y');
            }
        }
        // dd($data);
        return view('backend.dashboard',$data);
    }
}
