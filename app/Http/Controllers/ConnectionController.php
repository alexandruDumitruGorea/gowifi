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
        // COMPROBAR PERIODO MINIMO
        
        $insert = true;
        // Pregunta rango en el que está para coger el periodo mínimo
        $date = \DB::select("SELECT * FROM active WHERE deleted_at IS NULL AND '" . $request['fecha'] . "' BETWEEN start_date AND end_date");
        // Se guardará la conexión solo si hay un rango
        if(!empty($date)) {
            $miniumPeriod = $date[0]->minium_period;
            // Comprobar última conexión por la mac
            $lastConnection = \DB::select("SELECT * FROM `connection` WHERE mac = '" . $request['mac'] . "' ORDER BY hour DESC LIMIT 1");
            // Las comprobaciones de hora se hacen solo si la fecha es la misma
            if ($request['fecha'] === $lastConnection[0]->date) {
                $lastConnectionHour = new \DateTime($lastConnection[0]->hour);
                $connectinHour = new \DateTime($request['hora']);
                $difConnection = $lastConnectionHour->diff($connectinHour);
                if($difConnection->h < 10) {
                    $difConnectionHour = "0" . $difConnection->h;
                } else {
                    $difConnectionHour = $difConnection->h;
                }
                $difConnectionHour = (int)$difConnectionHour;
                if($difConnection->i < 10) {
                    $difConnectionMin = "0" . $difConnection->i;
                } else {
                    $difConnectionMin = $difConnection->i;
                }
                $difConnectionMin = (int)$difConnectionMin;
                
                $miniumPeriodHour = (int) explode(":", $miniumPeriod)[0];
                $miniumPeriodMin = (int) explode(":", $miniumPeriod)[1];
                
                var_dump($miniumPeriodMin . " / " . $difConnectionMin . "<br>");
                // Si la hora es la misma, pero los minutos son positivos
                if((($miniumPeriodHour - $difConnectionHour) < 0) === false && (($miniumPeriodMin - $difConnectionMin) < 0) === false) {
                    // FUERA
                    $insert = false;
                }
                // Si la hora es negativa o los min son negativos
                else {
                    // GUARDA
                    $insert = true;
                }
            } 
            // Si la fecha es otra y está dentro del rango entonces se hace la conexión
            else {
                $insert = true;
            }
        } else {
            $insert = false;
        }
        // FIN COMPROBAR PERIODO MINIMO
        if($insert) {
            try {
                $this->createConnection($request->all());
            } catch(\Exception $e) {
                return response()->json('todo mal');
            }
            return response()->json('todo bien');
        } else {
            return response()->json('todo mal');
        }
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
            'hour' => $now->format('H:i'),
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
