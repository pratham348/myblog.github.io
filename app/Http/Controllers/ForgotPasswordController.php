<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon; 
use Illuminate\Support\Facades\Mail ;
use App\Models\passwordreset;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function getEmail()
  {

     return view('email');
  }

 public function postEmail(Request $request)
  {
    $request->validate([
        'email' => 'required|email|exists:users',
    ]);

    $token = Str::random(64);

      passwordreset::insert(
          ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
      );

      Mail::send('verify', ['token' => $token], function($message) use($request){
          $message->to($request->email);
          $message->subject('Reset Password Notification');
      });

      return back()->with('message', 'We have e-mailed your password reset link!');
  }
}
