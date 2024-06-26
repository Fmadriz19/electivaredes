<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\usuarios;
use App\Models\Verifytoken;
use Illuminate\Http\Request;
use App\Models\AddProfile;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $get_user = usuarios::where('email', auth()->user()->email)->first();
        Log::info('isme kya aa rha hai'.$get_user);
        if ($get_user->is_activated == 1) {
            return view('home');
        } 
        else {
            return redirect()->route('verifyAccount');
        }
    }

    public function useractivation(Request $request)
    {
        $verifycoursetoken = $request->token;
        $verifycoursetoken = Verifytoken::where('token', $verifycoursetoken)->first();
        if ($verifycoursetoken) {
            $verifycoursetoken->is_activated = 1;
            $verifycoursetoken->save();
            $user = usuarios::where('email', $verifycoursetoken->email)->first();
            $user->is_activated = 1;
            $user->save();
            $getting_token = Verifytoken::where('token', $verifycoursetoken->token)->first();
            Log::info('getting token me kyaaa aa rha hai'.$getting_token);
            $getting_token->delete();
            return redirect('/home')->with('activated', 'Yout Account has been activated successfully');
        } else {
            return redirect('/verify-account')->with('incorrect', 'Your OTP is invalid please check your email OTP first');
        }
    }

    public function verifyAccount(Request $request)
    {
        return view('otp_verification');
    }
}