<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function login(Request $request)
    {
        $this->validateLogin($request);
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        if ($this->attemptLogin($request)) {
            $user = \Illuminate\Support\Facades\Auth::user();
            if($user->hasVerifiedEmail() && $user->disabled == 0) {
                // Logeado
                $this->sendLoginResponse($request);
                return redirect('wp/wp-json/custom-api/login?email=' . $request['email'] . '&password=' . $request['password']);
            } else {
                if($user->disabled == 0) {
                    $user->sendEmailVerificationNotification();
                    \Illuminate\Support\Facades\Auth::logout();
                    return redirect('wp/wp-login.php?noverify=true');
                } else {
                    return redirect('wp');
                }
            }
        } else {
            return redirect('wp/wp-login.php?loginfail=true');
        }
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }
    
    public function logout() {
        \Illuminate\Support\Facades\Auth::logout();
        return redirect('wp/wp-json/custom-api/logout');
    }
}

    // //API URL
    // $url = 'http://informatica.ieszaidinvergeles.org:9028/gowifi/public/wp/wp-json/custom-api/login';
    
    // // //create a new cURL resource
    // $ch = curl_init($url);
    // // //setup request to send json via POST
    // $datawp = array(
    //     'email' => $request['email'],
    //     'password' => $request['password'],
    // );
    // $payload = json_encode($datawp);
    
    // // //attach encoded JSON string to the POST fields
    // curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    
    // // //set the content type to application/json
    // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    
    // // //return response instead of outputting
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    // // //execute the POST request
    // $result = curl_exec($ch);
    // // //close cURL resource
    // // curl_close($ch);
