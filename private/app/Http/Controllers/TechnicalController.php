<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use Illuminate\Foundation\Auth\RegistersUsers;

class TechnicalController extends Controller
{
    
    use RegistersUsers;
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technicians = User::where([['rol_id', '=', '2'],['disabled', '=', '0']])->paginate(User::where([['rol_id', '=', '2'],['disabled', '=', '0']])->count());
        return response()->json([
            'data' => $technicians,
        ]);
    }
    
    public function disabled()
    {
        $technicians = User::where([['rol_id', '=', '2'],['disabled', '=', '1']])->paginate(User::where([['rol_id', '=', '2'],['disabled', '=', '1']])->count());
        return response()->json([
            'data' => $technicians,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$this->existTechnical($request['email'])->isEmpty()) {
            return redirect('wp/createtechnical?technicalCreateError=true&oldname=' . $request['name'] . '&oldemail=' . $request['email']);
            exit;
        }
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->createUser($request->all())));
        try {
            $this->registered($request, $user);
        } catch(\Exception $e) {
            return redirect('wp/createtechnical?technicalCreateError=true&oldname=' . $request['name'] . '&oldemail=' . $request['email']);
        }
        return redirect('wp/indextechnicians?technicalCreate=true');
    }
    
    private function existTechnical(string $email) {
        return User::where('email', $email)->get();
    }
    
    private function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
    }
    
    private function validatorEmail(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
    }
    
    private function createUser(array $data)
    {
        $url = 'http://informatica.ieszaidinvergeles.org:9028/gowifi/public/wp/wp-json/custom-api/register';
        $ch = curl_init($url);
        $datawp = array(
            'username' => $data['name'],
            'password' => '12345678',
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
            'password' => Hash::make('12345678'),
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
    public function show($thecnical_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thecnical  $thecnical
     * @return \Illuminate\Http\Response
     */
    public function edit($technical_id)
    {
        $technical = User::where('id', $technical_id)->get();
        return redirect('wp/edittechnical?id='. $technical[0]->id . '&oldemail=' . $technical[0]->email);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thecnical  $thecnical
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $technical = User::where('id', $request['id'])->get();
        if(!$this->existTechnical($request['email'])->isEmpty()) {
            return redirect('wp/edittechnical?errorEdit=true&id='. $technical[0]->id . '&oldemail=' . $technical[0]->email);
            exit;
        }
        $input = $this->validatorEmail($request->all())->validate();
        try {
            $technical[0]->rol_id = 1;
            $technical[0]->sendEmailVerificationNotification();
            $technical[0]->rol_id = 2;
            $technical[0]->email_verified_at = null;
            $technical[0]->update($input);
        } catch(\Exception $e) {
            return redirect('wp/edittechnical?errorEdit=true&id='. $technical[0]->id . '&oldemail=' . $technical[0]->email);
        }
        return redirect('wp/indextechnicians?edit=true');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thecnical  $thecnical
     * @return \Illuminate\Http\Response
     */
    public function destroy($technical_id)
    {
        $technical = User::where('id', $technical_id)->get();
        try {
            $technical[0]->disabled = 1;
            $technical[0]->save();
        } catch(\Exception $e) {
        }
        
        return redirect('wp/indextechnicians?disabled=true');
    }
    
    public function restoretechnical($technical_id)
    {
        $technical = User::where('id', $technical_id)->get();
        try {
            $technical[0]->disabled = 0;
            $technical[0]->save();
        } catch(\Exception $e) {
        }
        return redirect('wp/disabledtechnicians?enabled=true');
    }
}
