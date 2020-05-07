<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Equipo;
use App\Sala;
use Session;
use Illuminate\Support\Facades\Auth;
use PDF;
use Carbon\Carbon;

class EquipoController extends Controller
{

    protected $redirectTo = '/login';

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function mantenimientopdf() {
        Auth::user()->authorizeRoles(['ROLE_ADMINISTRADOR', 'ROLE_COORDINADOR']);
        $hoy = Carbon::today()->format('Y-m-d');
        $equipos = Equipo::whereRaw("activo = 1 AND DATEDIFF('" . $hoy . "',fecha_mantenimiento)  > 7")
        ->get();
        $data = [
            'equipos' => $equipos,
            'sala' => null
        ];
       
        $pdf = PDF::loadView('reports.pdf', $data);
        return $pdf->stream("Mantenimiento($hoy).pdf");
     }


     public function mantenimientoexcel() {
        Auth::user()->authorizeRoles(['ROLE_ADMINISTRADOR', 'ROLE_COORDINADOR']);
        $hoy = Carbon::today()->format('Y-m-d');
        \Excel::create("Mantenimiento($hoy)", function($excel) use($hoy){
            $equipos = Equipo::whereRaw("activo = 1 AND DATEDIFF('" . $hoy . "',fecha_mantenimiento)  > 7")
            ->get();
               $excel->sheet("Mantenimiento($hoy)", function($sheet) use($equipos) {
            
               $sheet->fromArray($equipos);
            
           });
            
           })->export('xlsx');
     }

     public function salapdf($id) {
        $sala = Sala::findOrFail($id);
        $equipos = equipo::where('sala', '=', $sala->id)
        ->get();
        $data = [
            'equipos' => $equipos,
            'sala' => $sala
        ];
       
        $pdf = PDF::loadView('reports.pdf', $data);
        return $pdf->stream('document.pdf');
     }
     public function salaexcel($id) {
       $sala = Sala::findOrFail($id);
        \Excel::create("Equipos de $sala->nombre", function($excel) use($sala){
            $equipos = equipo::where('sala', '=', $sala->id)
            ->get();
               $excel->sheet("Equipos de $sala->nombre", function($sheet) use($equipos) {
            
               $sheet->fromArray($equipos);
            
           });
            
           })->export('xlsx');
     }

 /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $equipos = Equipo::all();
        return View::make('equipos.index')
                    ->with('equipos', $equipos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        Auth::user()->authorizeRoles(['ROLE_ADMINISTRADOR', 'ROLE_COORDINADOR']);
        $salas = Sala::pluck('nombre', 'id');
        return View::make('equipos.create')
        ->with('salas', $salas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        Auth::user()->authorizeRoles(['ROLE_ADMINISTRADOR', 'ROLE_COORDINADOR']);
        $rules = array(
            'sala' => 'required|numeric',
            'tipo_procesador' => 'required|numeric',        
            'ram' => 'required|numeric',
            'hdd' => 'required|numeric',
            'so' => 'required',
            'monitor' => 'required',
            'fecha_mantenimiento' => 'required',
            'observacion' => 'required',
            'activo' => 'required|numeric',
        );
        $validator = Validator::make(Input::all(), $rules);


        if ($validator->fails()) {
            return Redirect::to('equipos/create')
                ->withErrors($validator);
        } else {

            $equipo = new Equipo;
            $equipo->sala = Input::get('sala');
            $equipo->tipo_procesador = Input::get('tipo_procesador');
            $equipo->ram = Input::get('ram');
            $equipo->hdd = Input::get('hdd');
            $equipo->so = Input::get('so');
            $equipo->monitor = Input::get('monitor');
            $equipo->fecha_mantenimiento = Input::get('fecha_mantenimiento');
            $equipo->observacion = Input::get('observacion');
            $equipo->activo= Input::get('activo');
            $equipo->save();
            $sala = Sala::findOrFail($equipo->sala);

            Session::flash('message', "El equipo #$equipo->id ha sido Creado en $sala->nombre!");
            return Redirect::to('equipos');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $equipo = Equipo::findOrFail($id);
        $sala = Sala::findOrFail($equipo->sala);
            return View::make('equipos.show')
                ->with(compact('equipo','sala'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        Auth::user()->authorizeRoles(['ROLE_ADMINISTRADOR', 'ROLE_COORDINADOR']);
        $equipo = Equipo::findOrFail($id);
        $sala = Sala::findOrFail($equipo->sala);
        $salas = Sala::pluck('nombre', 'id');
            return View::make('equipos.edit')
                ->with(compact('equipo','sala','salas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        Auth::user()->authorizeRoles(['ROLE_ADMINISTRADOR', 'ROLE_COORDINADOR']);
        $rules = array(
            'sala' => 'required|numeric',
            'tipo_procesador' => 'required|numeric',        
            'ram' => 'required|numeric',
            'hdd' => 'required|numeric',
            'so' => 'required',
            'monitor' => 'required',
            'fecha_mantenimiento' => 'required',
            'observacion' => 'required',
            'activo' => 'required|numeric',
        );
        $validator = Validator::make(Input::all(), $rules);


        if ($validator->fails()) {
            return Redirect::to('equipos/create')
                ->withErrors($validator);
        } else {

            $equipo = Equipo::findOrFail($id);
            $idsala = $equipo->sala;

            $equipo->sala = Input::get('sala');
            $equipo->tipo_procesador = Input::get('tipo_procesador');
            $equipo->ram = Input::get('ram');
            $equipo->hdd = Input::get('hdd');
            $equipo->so = Input::get('so');
            $equipo->monitor = Input::get('monitor');
            $equipo->fecha_mantenimiento = Input::get('fecha_mantenimiento');
            $equipo->observacion = Input::get('observacion');
            $equipo->activo= Input::get('activo');
            $equipo->save();
            $sala = Sala::findOrFail($equipo->sala);
            
            if($equipo->sala != $idsala){
                Session::flash('message', "El equipo #$id ha sido trasferido a la sala $sala->nombre!");
            }else{
                Session::flash('message', "El equipo #$id de $sala->nombre ha sido Editado!");
            }       
            return Redirect::to('equipos');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Auth::user()->authorizeRoles(['ROLE_ADMINISTRADOR', 'ROLE_COORDINADOR']);
        $equipo = Equipo::findOrFail($id);
        $sala = Sala::findOrFail($equipo->sala);
        $equipo->delete();
        Session::flash('message', "El equipo #$id de $sala->nombre ha sido Eliminado!");
        return Redirect::to('equipos');
    }

}