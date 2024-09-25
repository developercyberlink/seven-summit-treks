<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Http\Controllers\Controller;
use App\Models\Settings\SettingModel;
use App\Models\Travels\InquiryModel;
use Illuminate\Http\Request;

class InquiryController extends Controller
{

    public function inquiry(Request $request)
    {
        $g_recaptcha_response = $request->input('g_recaptcha_response');
        $response = $this->getCaptcha($g_recaptcha_response);
        // Check if success is true and Score is greater than 0.5 [ $result->score > 0.5 ]
        if ($response->success == false && $response->score < 0.5) {
            return redirect()->back()->with('status', 'You are Robot!');
        }
        $method = $request->method();
        if ($request->isMethod('post')) {
            $data = $request->all();
            $result = InquiryModel::create($data);
            if ($result) {
                $data = SettingModel::where('id', 1)->first();
                // Mail::to($data['email_primary'])->send(new SendInquiry());
                return redirect()->back()->with('message', 'Inquiry message sent successfully.');
            }
        }
        return redirect()->back()->with('message', 'Try again.');
    }

    private function getCaptcha($secretKey)
    {
        $secret_key = env('SECRET_KEY');
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secret_key . "&response={$secretKey}");
        $result = json_decode($response);
        return $result;
    }

}
