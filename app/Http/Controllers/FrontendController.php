<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class FrontendController extends Controller
{
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
}
