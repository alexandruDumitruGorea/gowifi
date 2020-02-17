<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class NavController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function logout() {
        \Illuminate\Support\Facades\Auth::logout();
        return redirect('wp/wp-json/custom-api/logout');
    }
    
    public function role(Request $request) {
        $user = User::where('email', $request['email'])->get();
        return response()->json(['user' => $user]);
    }
}
