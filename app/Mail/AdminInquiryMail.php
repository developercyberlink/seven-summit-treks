<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Settings\SettingModel;


class AdminInquiryMail extends Mailable
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
        $data = SettingModel::where('id', 1)->first();
        $mail=$request->email;
        $name=$request->name;
        $country=$request->country;
        $contact=$request->number;
        $message=$request->message;
        $email = $data->email_secondary;
        $trip = $request->trip_id ? tripname($request->trip_id)->trip_title : tripname($request->expedition_id)->trip_title;
        return $this->from($mail)->view('emails.admin-inquiry', ['email' => $mail,'name'=>$name,'country'=>$country,'contact'=>$contact,'messages'=>$message,'trip'=>$trip])->to($email);
    }
}
