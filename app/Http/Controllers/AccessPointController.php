<?php

namespace App\Http\Controllers;

use App\AccessPoint;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class AccessPointController extends Controller
{
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
        $accessPoints = AccessPoint::paginate(AccessPoint::where('deleted_at','<>','null')->count());
        return response()->json([
            'data' => $accessPoints,
        ]);
    }
    
    public function disabled()
    {
        $accessPoints = AccessPoint::onlyTrashed()->paginate(AccessPoint::onlyTrashed()->count());
        // $accessPoints = AccessPoint::onlyTrashed()->where('id_technical', 1)->get();
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
        $accessPoint = AccessPoint::where('id', $accessPoint_id)->get();
        return redirect('wp/showaccesspoint/' . $accessPoint_id . '?id=' . $accessPoint[0]->id . '&model=' . $accessPoint[0]->model . '&location=' .$accessPoint[0]->location . '&latitude=' . $accessPoint[0]->latitude . '&longitude=' . $accessPoint[0]->longitude);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AccessPoint  $accessPoint
     * @return \Illuminate\Http\Response
     */
    public function edit($accessPoint_id)
    {
        // dd($accessPoint_id);
        $accessPoint = AccessPoint::where('id', $accessPoint_id)->get();
        return redirect('wp/editaccesspoint?id='. $accessPoint[0]->id .'&oldmodel=' . $accessPoint[0]->model . '&oldlocation=' . $accessPoint[0]->location . '&oldlatitude=' . $accessPoint[0]->latitude . '&oldlongitude=' . $accessPoint[0]->longitude);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AccessPoint  $accessPoint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $input = $this->validator($request->all())->validate();
        try {
            $accessPoint = AccessPoint::where('id', $request['id'])->get();
            $accessPoint[0]->update($input);
        } catch(\Exception $e) {
            $result = false;
        }
        return redirect('wp/indexaccesspoints');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AccessPoint  $accessPoint
     * @return \Illuminate\Http\Response
     */
    public function destroy($accessPointId)
    {
        $accessPoint = AccessPoint::where('id', $accessPointId)->get();
        try {
            $result = $accessPoint[0]->delete();    
        } catch(\Exception $e) {
            $result = false;
        }
        
        return redirect('wp/indexaccesspoints');
    }
    
    public function restoreAccessPoint(Request $request, $id)
    {
        AccessPoint::withTrashed()->find($id)->restore();
        return redirect('wp/disabledaccesspoints');
    }
}
