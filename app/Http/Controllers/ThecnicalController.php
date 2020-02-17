<?php

namespace App\Http\Controllers;

use App\Thecnical;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ThecnicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(\Auth::check()) {
            return view('admin.thecnical.create');
        } else {
            return 'mierda';
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->createUser($request->all())));
        $request->session()->flash('op', 'registered');
        try {
            $this->registered($request, $user);
            // $user->markEmailAsVerified();
            $request->session()->flash('op', 'createSpeaker');
        } catch(\Exception $e) {
            $request->session()->flash('op', 'errorCreateSpeaker');
            return redirect(route('thecnical.create'))->withInput();
        }
        return redirect(url('admin'));
    }
    
    private function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
    }
    
    private function createUser(array $data)
    {
        $url = 'http://informatica.ieszaidinvergeles.org:9028/gowifi/public/wp/wp-json/custom-api/register';
        $ch = curl_init($url);
        $datawp = array(
            'username' => $data['name'],
            'password' => $data['password'],
            'email' => $data['email'],
        );
        $payload = json_encode($datawp);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'api_token' => Str::random(80),
            'rol_id' => 2,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thecnical  $thecnical
     * @return \Illuminate\Http\Response
     */
    public function show(Thecnical $thecnical)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thecnical  $thecnical
     * @return \Illuminate\Http\Response
     */
    public function edit(Thecnical $thecnical)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thecnical  $thecnical
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thecnical $thecnical)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thecnical  $thecnical
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thecnical $thecnical)
    {
        //
    }
}
