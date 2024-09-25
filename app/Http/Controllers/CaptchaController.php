<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptchaController extends Controller
{
    public function create()
 {
     return view('themes.default.captchacreate');
 }
 public function captchaValidate(Request $request)
 {
     $request->validate([
         'name' => 'required',
         'email' => 'required|email',
         'password' => 'required|min:6',
         'captcha' => 'required|captcha'
     ]);
 }
 public function refreshCaptcha()
 {
     return response()->json(['captcha'=> captcha_img('mini')]);
 }

  public function contactCaptcha()
 {
     return response()->json(['captcha'=> captcha_img('mini')]);
 }

   public function corporateCaptcha()
 {
     return response()->json(['captcha'=> captcha_img('mini')]);
 }
 
}
