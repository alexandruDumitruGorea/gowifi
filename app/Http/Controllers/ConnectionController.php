<?php

namespace App\Http\Controllers;

use App\Connection;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\UserAccessPoint;

class ConnectionController extends Controller
{
    private $userLaravelID;

    public function store(Request $request)
    {
        // file_put_contents('prueba.txt', $request->getContent()."\n", FILE_APPEND | LOCK_EX);
        $this->validator($request->all())->validate();
        try {
            $this->createConnection($request->all());
        } catch(\Exception $e) {
            return response()->json('todo mal');
        }
        return response()->json('todo bien');
    }
    
    private function validator(array $data)
    {
        return Validator::make($data, [
            'fecha' => ['required', 'string'],
            'hora' => ['required', 'string'],
            'idpuntoacceso' => ['required', 'integer', 'exists:access_point,id'],
            'mac' => ['required', 'string'],
        ]);
    }
    
    private function createConnection(array $data)
    {
        return Connection::create([
            'id_access_point' => $data['idpuntoacceso'],
            'date' => $data['fecha'],
            'hour' => $data['hora'],
            'mac' => $data['mac'],
        ]);
    }
    
    public function storeconection(Request $request)
    {
        $this->userLaravelID = $request->user()->id;
        // dd(exec('arp -an'));
        $this->validator($request->all())->validate();
        try {
            $this->createUserConnection($request->all());
            $this->createUserAccessPointConnection($request->all());
        } catch(\Exception $e) {
            return redirect('wp/createtechnical?technicalCreateError=true&oldname=' . $request['name'] . '&oldemail=' . $request['email']);
        }
        return redirect('wp/indextechnical?technicalCreate=true');
    }
    
    private function createUserConnection(array $data)
    {
        $now = Carbon::now();
        return Connection::create([
            'id_access_point' => $data['id_access_point'],
            'date' => $now->format('Y-m-d'),
            'hour' => $now->format('H:i:s'),
            'mac' => '40-30-20-10-00',
        ]);
    }
    
    private function createUserAccessPointConnection(array $data)
    {
        return UserAccessPoint::create([
            'id_user' => $this->userLaravelID,
            'id_access_point' => $data['id_access_point'],
        ]);
    }
}
