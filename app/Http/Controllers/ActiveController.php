<?php

namespace App\Http\Controllers;

use App\Active;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class ActiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activeHours = Active::paginate(Active::all()->count());
        return response()->json([
            'data' => $activeHours,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules(), $this->messages());
        if($validator->fails()) {
            return redirect('wp/createactivehour?errorCreateActiveHour=true&start_date='.$request['start_date'].
                            '&end_date='.$request['end_date'].'&start_hour='.$request['start_hour'].'&end_hour='.$request['end_hour'].'&minium_period='.$request['minium_period']);
            // dd($validator->errors()->get('start_date') === null);
        }
        // CREAR ALGORITMO VALIDO
        try {
            $this->createActiveHour($request->all());
        } catch(\Exception $e) {
            return redirect('wp/createactivehour?errorCreateActiveHour=true&start_date='.$request['start_date'].
                            '&end_date='.$request['end_date'].'&start_hour='.$request['start_hour'].'&end_hour='.$request['end_hour'].'&minium_period='.$request['minium_period']);
        }
        return redirect('wp/indexactivehours?activeHourCreate=true');
    }
    
    private function createActiveHour(array $data)
    {
        return Active::create([
            'start_date'        => $data['start_date'],
            'end_date'          => $data['end_date'],
            'start_hour'        => $data['start_hour'],
            'end_hour'          => $data['end_hour'],
            'minium_period'     => $data['minium_period'],
        ]);
    }
    
    private function rules()
    {
        return [
            'start_date'        => 'required|date|after_or_equal:today',
            'end_date'          => 'required|date|after_or_equal:fechainicial',
            'start_hour'        => 'date_format:H:i',
            'end_hour'          => 'date_format:H:i|after:start_hour',
            'minium_period'     => 'date_format:H:i',
        ];
    }
    
    private function messages() {
        return [
            'start_date.after_or_equal'     => 'La :attribute debe ser hoy o posterior',
            'end_hour.after'                => 'La :attribute debe de ser mayor a la start_hour'
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Active  $active
     * @return \Illuminate\Http\Response
     */
    public function show(Active $active)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Active  $active
     * @return \Illuminate\Http\Response
     */
    public function edit(Active $active)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Active  $active
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Active $active)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Active  $active
     * @return \Illuminate\Http\Response
     */
    public function destroy(Active $active)
    {
        //
    }
}
