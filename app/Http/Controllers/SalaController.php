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
use DB;
use Illuminate\Support\Facades\Auth;

class SalaController extends Controller
{
    protected $redirectTo = '/login';
    
    public function __construct()
    {
        $this->middleware('auth');
    }
 /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $salas = Sala::paginate(1);
        return View::make('salas.index')
                    ->with('salas', $salas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        Auth::user()->authorizeRoles(['ROLE_ADMINISTRADOR', 'ROLE_COORDINADOR']);
        return View::make('salas.create');
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
            'nombre' => 'required',
            'ubicacion' => 'required',
            'encargado' => 'required',
            'capacidad' => 'required|numeric',
            'videobeam' => 'required|numeric',
            'estado' => 'required|numeric',
        );
        $validator = Validator::make(Input::all(), $rules);


        if ($validator->fails()) {
            return Redirect::to('salas/create')
                ->withErrors($validator);
        } else {

            $sala = new Sala;
            $sala->nombre = Input::get('nombre');
            $sala->ubicacion = Input::get('ubicacion');
            $sala->encargado = Input::get('encargado');
            $sala->capacidad = Input::get('capacidad');
            $sala->videobeam = Input::get('videobeam');
            $sala->estado = Input::get('estado');
            $sala->save();


            Session::flash('message', "$sala->nombre ha sido Creada!");
            return Redirect::to('salas');
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
        $sala = Sala::findOrFail($id);
        $equipos = DB::table('equipos')->where('sala','=', $id)->get();
            return View::make('salas.show')
                ->with(compact('sala', 'equipos'));
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
        $sala = Sala::findOrFail($id);
        return View::make('salas.edit')
        ->with('sala', $sala);
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
            'nombre' => 'required',
            'ubicacion' => 'required',
            'encargado' => 'required',
            'capacidad' => 'required|numeric',
            'videobeam' => 'required|numeric',
            'estado' => 'required|numeric',
        );
        $validator = Validator::make(Input::all(), $rules);


        if ($validator->fails()) {
            return Redirect::to('salas/create')
                ->withErrors($validator);
        } else {

            $sala = Sala::findOrFail($id);
            $sala->nombre = Input::get('nombre');
            $sala->ubicacion = Input::get('ubicacion');
            $sala->encargado = Input::get('encargado');
            $sala->capacidad = Input::get('capacidad');
            $sala->videobeam = Input::get('videobeam');
            $sala->estado = Input::get('estado');
            $sala->save();


            Session::flash('message', "$sala->nombre ha sido Editada!");
            return Redirect::to('salas');
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
        $sala = Sala::findOrFail($id);
        $sala->delete();
        Session::flash('message', "$sala->nombre ha sido Eliminada!");
        return Redirect::to('salas');
    }

}