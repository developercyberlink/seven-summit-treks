<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Settings\SettingModel;


class AdminContactMail extends Mailable
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
        $name=$request->first_name;
        $surname=$request->surname;
        $country=$request->country;
        $contact=$request->number;
        $interest=$request->interest;
        $experience=$request->experience;
        $message=$request->message;
        $email = $data->email_secondary;
        return $this->from($mail)->view('emails.admin-contactmail', ['email' => $mail,'name'=>$name,'surname'=>$surname,'country'=>$country,'contact'=>$contact,'messages'=>$message,'interest'=>$interest,'experience'=>$experience])->to($email);
    }
}
