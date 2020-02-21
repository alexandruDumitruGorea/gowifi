<?php

namespace App\Http\Controllers;

use App\AccessPoint;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class AccessPointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accessPoints = AccessPoint::paginate(AccessPoint::all()->count());
        return response()->json([
            'data' => $accessPoints,
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
        $this->validator($request->all())->validate();
        try {
            $this->createAccessPoint($request->all());
        } catch(\Exception $e) {
            return redirect('wp/createaccesspoint?technicalCreateError=true&model='.$request['model'].'&location='.$request['location'].'&latitude='.$request['latitude'].'&longitude='.$request['longitude']);
        }
        return redirect('wp/indexaccesspoints?accesspointCreate=true');
    }
    
    private function validator(array $data)
    {
        return Validator::make($data, [
            'model' => ['required', 'string', 'max:100'],
            'location' => ['required', 'string', 'max:255'],
            'latitude' => ['required', 'string', 'max:255'],
            'longitude' => ['required', 'string', 'max:255'],
        ]);
    }
    
    private function createAccessPoint(array $data)
    {
        $now = Carbon::now();
        return AccessPoint::create([
            'id_technical' => \Illuminate\Support\Facades\Auth::user()->id,
            'model' => $data['model'],
            'location' => $data['location'],
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
            'date_register' => $now->format('Y-m-d'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AccessPoint  $accessPoint
     * @return \Illuminate\Http\Response
     */
    public function show($accessPoint_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AccessPoint  $accessPoint
     * @return \Illuminate\Http\Response
     */
    public function edit($accessPoint_id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AccessPoint  $accessPoint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccessPoint $accessPoint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AccessPoint  $accessPoint
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccessPoint $accessPoint)
    {
        //
    }
}
