<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Payment\TripayController;
use App\Models\Bromo;

use Mail;

class FrontendController extends Controller
{
    function __construct(
        TripayController $tripay,
        Bromo $bromo
    )
    {
        $this->tripay = $tripay;
        $this->bromo = $bromo;
    }
    public function index()
    {
        return view('frontend.index');
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

    public function bromo_checkout($id)
    {
        $data['bromo'] = $this->bromo->find($id);
        if (empty($data['bromo'])) {
            return redirect()->back();
        };
        $tripay = $this->tripay;
        $data['channels'] = json_decode($tripay->getPayment())->data;
        return view('frontend.bromocheckout',$data);
    }
}
