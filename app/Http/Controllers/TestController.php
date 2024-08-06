<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

class TestController extends Controller
{
    public function testEmail(Request $request)
    {
        // $data['title'] = 'TestEmail';
        // Mail::mailer('marketing')->send('mails.testMail',$data, function($message) use($data){
        //     $message->to('rioanugrah999@gmail.com')
        //             ->subject('Test Email');
        // });
        $datas = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'number' => $request->number,
            'message' => $request->message,
        ];
        $send_mail = Mail::mailer('marketing')->to('rioanugrah8899@gmail.com')
        ->send(new \App\Mail\ContactUs($datas));
    }
}
