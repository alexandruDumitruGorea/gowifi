<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class NavController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    
    public function logout() {
        \Illuminate\Support\Facades\Auth::logout();
        return redirect('wp/wp-json/custom-api/logout');
    }
    
    public function role(Request $request) {
        $user = User::where('email', $request['email'])->get();
        // $user = \Illuminate\Support\Facades\Auth::user();
        return response()->json(['user' => $user]);
    }
    
    public function csrf_token_for_wp() {
        return response()->json(['csrf' => csrf_token()]);
    }
    
    public function redirectwpresetpass(Request $request) {
        return redirect('wp/resetpassword?token=', $request['token']);
    }
}
