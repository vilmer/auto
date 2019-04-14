<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RqIngreseoServicio;
use App\Servicio;
use App\DataTables\ServicioDataTable;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    public function autos()
    {
        return view('autos.index');
    }

    public function servicios(ServicioDataTable $dataTable)
    {
        return $dataTable->render('servicios.index');
    }

    public function guardarServicio(RqIngreseoServicio $request)
    {
        $ser=new Servicio;
        $ser->nombre=$request->nombre;
        $ser->precio=$request->precio;
        $ser->descripcion=$request->descripcion;
        $ser->save();
        $request->session()->flash('success','Servicio guardado');
        return redirect()->route('servicios');
    }
}
