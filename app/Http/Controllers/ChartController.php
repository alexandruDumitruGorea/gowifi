<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\UserAccessPoint;
use App\AccessPoint;
use App\Connection;

class ChartController extends Controller
{
    public function numConnectionsByDaY() {
        $connectionsOrderByDay = Connection::all()->groupBy('date')->take(10);
        return response()->json([
            'data' => $connectionsOrderByDay,
        ]);
    }
    
    public function numAccessPointByTechnical() {
        $accessPointByTechnical = \DB::select('SELECT count(*) as num, (SELECT name FROM users where id_technical = id) AS technical FROM access_point GROUP BY id_technical');
        // $accessPointByTechnical = AccessPoint::all()->groupBy('id_technical');
        return response()->json([
            'data' => $accessPointByTechnical,
        ]);
    }
}
