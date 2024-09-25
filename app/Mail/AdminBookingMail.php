<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Settings\SettingModel;

class AdminBookingMail extends Mailable
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
        $mail = $request->email;
        $name = $request->full_name;
        $country = $request->country;
        $contact = $request->contact;
        $message = $request->comments;
        $arrival_date = $request->arrival_date;
        $departure_date = $request->departure_date;
        $reference = $request->reference;
        $trip = $request->trip_id ? tripname($request->trip_id)->trip_title : tripname($request->expedition_id)->trip_title;
        $email = $data->email_secondary;
      
        return $this->from($mail)->view('emails.admin-bookingmail', ['email' => $mail,'name'=>$name,'country'=>$country,'contact'=>$contact,'messages'=>$message,'arrival_date'=>$arrival_date,'departure_date'=>$departure_date,'reference'=>$reference,'trip'=>$trip])->to($email);
    }
}
