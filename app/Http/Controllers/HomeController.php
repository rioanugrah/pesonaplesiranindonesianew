<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;

use \Carbon\Carbon;

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
        if (auth()->user()->getRoleNames()->first() == 'Administrator') {
            $data['total_penjualan_year'] = $this->transaction->whereYear('created_at',Carbon::now())->sum('transaction_price');
            $data['total_penjualan_month'] = $this->transaction->whereMonth('created_at',Carbon::now())->sum('transaction_price');
        }else{
            $data['total_penjualan_year'] = $this->transaction->whereYear('created_at',Carbon::now())->where('user',auth()->user()->generate)->sum('transaction_price');
            $data['total_penjualan_month'] = $this->transaction->whereMonth('created_at',Carbon::now())->where('user',auth()->user()->generate)->sum('transaction_price');
        }
        // dd($data);
        return view('backend.dashboard',$data);
    }
}
