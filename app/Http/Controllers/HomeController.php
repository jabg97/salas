<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Equipo;
use App\Sala;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hoy = Carbon::today()->format('Y-m-d');
        $equipos = Equipo::whereRaw("activo = 1 AND DATEDIFF('" . $hoy . "',fecha_mantenimiento)  > 7")->get();
        $cantidad_disponible = Sala::where("estado","=","disponible")->count();
        $cantidad_mantenimiento = Sala::where("estado","=","mantenimiento")->count();
        $cantidad_clase = Sala::where("estado","=","en clase")->count();
        $cantidad_cerrada = Sala::where("estado","=","cerrada")->count();
        $activo = Equipo::where("activo","=","1")->count();
        $inactivo = Equipo::where("activo","=","0")->count();
        
        return View::make('home')
        ->with(compact('equipos'
        ,'cantidad_disponible'
        ,'cantidad_mantenimiento'
        ,'cantidad_clase'
        ,'cantidad_cerrada'
        ,'activo'
        ,'inactivo'));
    }
}
