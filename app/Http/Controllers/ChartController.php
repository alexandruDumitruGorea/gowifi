<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\UserAccessPoint;
use App\AccessPoint;
use App\Connection;

class ChartController extends Controller
{
    public function numConnectionsByMonth() {
        // $connectionsOrderByDay = \DB::select('SELECT count(*) as num, date FROM connection WHERE date is not NULL group by date order by date');
        $connectionsOrderByMonth = \DB::select('SELECT count(*) as num, MONTH(date) as month, YEAR(date) as year FROM connection group by month, year order by year ASC, month ASC');
        return response()->json([
            'data' => $connectionsOrderByMonth,
        ]);
    }
    
    public function numAccessPointByTechnical() {
        $accessPointByTechnical = \DB::select('SELECT count(*) as num, (SELECT name FROM users where id_technical = id) AS technical FROM access_point GROUP BY id_technical');
        return response()->json([
            'data' => $accessPointByTechnical,
        ]);
    }
    
    public function numConnectionByLocation() {
        // SELECT count(*) as num, (SELECT location from access_point WHERE id = C.id_access_point) as location FROM connection as C group by location order by location
        // SELECT count(*) as num, MONTH(date) as month, YEAR(date) as year, (SELECT location from access_point WHERE id = C.id_access_point) as location FROM connection as C group by location, month, year order by location, year ASC, month ASC
        $connectionsOrderByLocation = \DB::select('SELECT count(*) as num, MONTH(date) as month, YEAR(date) as year, (SELECT location from access_point WHERE id = C.id_access_point) as location FROM connection as C group by location, month, year order by location, year ASC, month ASC');
        return response()->json([
            'data' => $connectionsOrderByLocation,
        ]);
    }
    
    public function numConnectionsByLocation() {
        // SELECT count(*) as num, (SELECT location from access_point WHERE id = C.id_access_point) as location FROM connection as C group by location order by location
        // SELECT count(*) as num, MONTH(date) as month, YEAR(date) as year, (SELECT location from access_point WHERE id = C.id_access_point) as location FROM connection as C group by location, month, year order by location, year ASC, month ASC
        $connectionsOrderByLocation = \DB::select('SELECT count(*) as num, (SELECT location from access_point WHERE id = C.id_access_point) as location FROM connection as C group by location order by location');
        return response()->json([
            'data' => $connectionsOrderByLocation,
        ]);
    }
}
