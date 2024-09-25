<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use App\Providers\api\Payment;
use App\Models\Inquiry\BookingModel;
use Session;


class PaymentRequestController extends Controller
{
    public function paymentRequest(Request $request, Payment $payment){ 
        try {
            if ($request->isMethod('post')) {
                // $request->validate([
                    // 'full_name' => 'required',
                    // 'email' => 'required',
                    // 'phone' => 'required',
                    // 'country' => 'required',
                    // 'terms_conditions' => 'required',
                    // 'h-captcha-response' => 'required|HCaptcha',
                // ]);   
                $book = new BookingModel();     
                $book->trip_id = $request->trip_id;
                $book->input_amount = $request->input_amount;
                $book->full_name = $request->full_name;
                $book->email = $request->email;
                $book->country = $request->country;
                $book->phone = $request->phone;
                $book->comments = $request->comments;
                $book->terms_conditions = $request->terms_conditions;
                $book->save();
            }
            $payment = new Payment();
        
            // echo "Payment jose request \n ";
            $joseResponse = $payment->ExecuteFormJose($_POST['merchant_id'],$_POST['api_key'],$_POST['input_currency'],$_POST['input_amount'],$_POST['input_3d'],$_POST['success_url'],$_POST['fail_url'],$_POST['cancel_url'],$_POST['backend_url'], $book);

            $response_obj = json_decode($joseResponse);
            $backUrl = session('back_url');
            Session::put('back', $backUrl);
            Session::put('amt', $request->input_amount);
            Session::put('book', $book);
            return redirect($response_obj->response->Data->paymentPage->paymentPageURL);

        
        } catch (GuzzleException $e) {
            echo '\n Message: ' . $e->getMessage();
            echo '\n Trace: ' . $e->getTraceAsString();
        } catch (Exception $e) {
            echo '\n Message: ' . $e->getMessage();
            echo '\n Trace: ' . $e->getTraceAsString();
        }  

    }

    public function paymentStatus(){
        if($_GET['payment'] == "success"){
            $book = BookingModel::where('trip_id', session('book')->trip_id)->first();
            $book->paid_status = 1;
            $book->input_amount = session('amt');
            $book->save();
            return redirect(session('back'));
        }else{
            // dd($_GET['payment']);
            return redirect(session('back'))->with('error','Payment Failed!');
           
        }
        
    }
}
