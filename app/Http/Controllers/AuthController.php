<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $phone_number = $request->input('phone_number');
        $existingUser = User::where('phone_number', $phone_number)->first();
        if ($existingUser) {
            $otp = mt_rand(100000, 999999);
            $existingUser->otp = $otp;
            $existingUser->save();
        } else {
            $otp = mt_rand(100000, 999999);
            $user = new User();
            $user->phone_number = $phone_number;
            $user->otp = $otp;
            $user->save();
        }
        Session::put('otp',$otp);
        return redirect()->route('verify')->with('success', "Register successfully. Enter OTP to login: $otp");
    }

    public function showVerificationForm()
    {
        return view('verify');
    }

    public function verify(Request $request)
    {
        $user = User::where('otp', $request->input('otp'))->first();
        if ($user) {
            Session::put('userId',$user->id);
            return redirect()->route('location.show')->with('success','User logged in Successfully');
        } else {
            return 'Invalid OTP.';
        }
    }

    public function getOtp(Request $request)
    {
    return response()->json(['otp' => $request->session()->get('otp')]);
    }

    public function logOut(){
        Session::pull('userId');
        Session::pull('otp');
        return redirect('/')->with('success','logged out');
    }

}
