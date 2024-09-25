<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class SendInquiry extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        $request->validate([
            'full_name'=> 'Required',
            'email'=>'Required',
            'phone'=>'Required',
            'nationality'=>'Required',
            'message'=>'Required'
            ]);
        $emailfrom = env('MAIL_USERNAME');
        $message_subject = env('MESSAGE_SUBJECT2');
        return $this->from($emailfrom)
            ->view('themes.default.mail.SendInquiry',['fullname'=>$request->fullname,'nationality'=>$request->nationality,'phone'=>$request->phone,'email'=>$request->email_address,'comments'=>$request->comments])
            ->subject($message_subject);
    }
}
