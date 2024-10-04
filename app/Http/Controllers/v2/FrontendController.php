<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bromo;
use App\Models\BromoList;
use App\Models\Transactions;
use \Carbon\Carbon;

class FrontendController extends Controller
{
    function __construct(
        Bromo $bromo,
        BromoList $bromo_list,
        Transactions $transactions
    ){
        $this->bromo = $bromo;
        $this->bromo_list = $bromo_list;
        $this->transactions = $transactions;
        $this->addDay = 0;
    }

    public function index()
    {
        return view('frontend2.index');
    }

    public function bromo()
    {
        $data['bromos'] = $this->bromo->paginate(10);
        return view('frontend2.wisata.bromo.index',$data);
    }

    public function contact_us()
    {
        return view('frontend2.contact');
    }
}
