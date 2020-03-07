<?php

namespace App\Http\Controllers;

use App\Active;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\User;

class ActiveController extends Controller
{
    private $dateInRange;
    
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
        $activeHours = Active::paginate(Active::all()->count());
        return response()->json([
            'data' => $activeHours,
        ]);
    }

    public function store(Request $request)
    {
        $errors = '&start_date='.$request['start_date'].'&end_date='.$request['end_date'].'&start_hour='.$request['start_hour'].'&end_hour='.$request['end_hour'].'&minium_period='.$request['minium_period'];
        $validator = Validator::make($request->all(), $this->rules(), $this->messages(), $this->attributes());
        if($validator->fails()) {
            if(!empty($validator->errors()->get('start_date'))) {
                $errors = $errors.'&starDateProblem=true';
            }
            if(!empty($validator->errors()->get('end_hour'))) {
                $errors = $errors.'&endHourProblem=true';
            }
            return redirect('wp/createactivehour?errorCreateActiveHour=true'.$errors);
        }
        // CREAR ALGORITMO VALIDO
        $insert = true;
        // Existe y encima entá dentro del rango
        if($this->existInDateRange($request['start_date']) && ($request['start_date'] !== $this->dateInRange[0]->end_date)) {
            // FUERA
            $errors = $errors.'&dateExists=true';
            $insert = false;
        }
        // Existe pero la fecha de inicio es igual a la fecha final del rango
        else if($this->existInDateRange($request['start_date']) && ($request['start_date'] === $this->dateInRange[0]->end_date)) {
            // Comprueba horas
            // Existe en rango de horas
            if($request['start_hour'] >= $this->dateInRange[0]->start_hour && $request['start_hour'] <= $this->dateInRange[0]->end_hour){
                $errors = $errors.'&hourExistsInDate=true';
                // FUERA
                $insert = false;
            }
            // Si la hora de inicio es mayor a la hora final del rango 
            else if ($request['start_hour'] > $this->dateInRange[0]->end_hour) {
                // GUARDA
                $insert = true;
            }
        }
        // Si no existe en el rango
        else {
            // GUARDA
            $insert = true;
        }
        // FIN CREAR ALGORITMO
        if($insert) {
            try {
                $this->createActiveHour($request->all());
            } catch(\Exception $e) {
                return redirect('wp/createactivehour?errorCreateActiveHour=true'.$errors);
            }
            return redirect('wp/indexactivehours?activeHourCreate=true');
        } else {
            return redirect('wp/createactivehour?errorCreateActiveHour=true'.$errors);
        }
    }
    
    private function existInDateRange($startDate) {
        $date = \DB::select("SELECT * FROM active WHERE deleted_at IS NULL AND '$startDate' BETWEEN start_date AND end_date");
        $this->dateInRange = $date;
        return !empty($date);
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
    
    private function attributes() {
        return [
            'start_date' => "Fecha inicio",
        ];
    }

    public function destroy(Request $request, $active_id)
    {
        $user = User::where('api_token', $request['api_token'])->first();
        if($user !== null) {
            $active = Active::find($active_id);
            try{
                $active->delete();
                return redirect('wp/indexactivehours?activeHourDelete=true');
            } catch(\Exception $e) {
                $result = false;
            }
        }
    }
}
