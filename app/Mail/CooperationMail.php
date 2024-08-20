<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CooperationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
        // return $this->from(env('MAIL_FROM_ADDRESS_MARKETING'), env('MAIL_FROM_NAME_MARKETING'))
                    ->subject($this->details['subject'])
                    ->view('backend.cooperation.emailvalidasi',[
                        'data' => $this->details['data']
                    ]);
        // return $this->view('view.name');
    }
}
