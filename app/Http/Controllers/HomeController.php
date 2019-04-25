<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RqIngreseoServicio;
use App\Http\Requests\RqActualizarServ;
use App\Http\Requests\RqIngreseoAuto;
use App\Http\Requests\RqActualizarAuto;
use App\Http\Requests\RqIngreseOrden;
use App\Servicio;
use App\Auto;
use App\User;
use App\Orden;
use App\Item;
use App\DataTables\ServicioDataTable;
use App\DataTables\AutoDataTable;
use App\DataTables\OrdenDataTable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use PDF;
use Illuminate\Support\Facades\Storage;

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






    public function index()
    {
        return view('home');
    }
   


    /*ordenes*/
    public function ordenes(Request $request)
    {
        $data = array(
            'encargados' => User::where('perfil','empleado')->get(),
            'autos'=>Auto::orderBy('placa','asc')->get(),
            'servicios'=>Servicio::all()
         );
       
        return view('ordenes.index',$data);
    }


    /*historial*/

    public function historial(OrdenDataTable $dataTable)
    {
         return $dataTable->render('ordenes.historial'); 
    }

    /*imprimir orden*/

    public function imprimirOrden($idOr)
    {
        $data = array('o' => Orden::find($idOr));
        $pdf = PDF::loadView('ordenes.imprimir', $data);
        return $pdf->inline('orden.pdf');
    }

    public function eliminarOrden(Request $request,$idOr)
    {
        try {
            $data = Orden::find($idOr);
            $data->delete();
            $request->session()->flash('success','Orden eliminado');
        } catch (\Exception $e) {
            $request->session()->flash('info','Orden no eliminado');
        }
        return redirect()->route('historial');
    }
    

    public function ingresoOrden(RqIngreseOrden $request)
    {
       
       $o=new Orden;
       $o->user_id=Auth::id();
       $o->auto_id=$request->vehiculo;
       $o->detalle=$request->detalle;
       $o->save();
       foreach ($request->servicios as $serv) {
           $i=new Item;
           $i->orden_id=$o->id;
           $i->servicio_id=$serv;
           $i->save();
       }
       
        $request->session()->flash('success','Orden guardado');
        return redirect()->route('ordenes');
        
    }

        /*empleados*/
    public function registroEmpleado(Request $request)
    {
         $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' =>'required|string|min:8|confirmed'

        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'perfil'=>'empleado'
        ]);

        $request->session()->flash('success','Encargado guardado');
        return redirect()->route('ordenes');
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

        if ($request->hasFile('foto')) {
            $foto=$ser->id.'_'.Carbon::now().'.'.$request->foto->extension();
            $path = $request->foto->storeAs('servicios', $foto,'public');
            $ser->foto=$foto;    
            $ser->save();
        }

        $request->session()->flash('success','Servicio guardado');
        




         if ($request->opcion=='orden') {
            return redirect()->route('ordenes');
        }else{
            return redirect()->route('servicios');
        }
    }

    public function eliminarServicio(Request $request,$idSer)
    {
        try {
            $ser=Servicio::find($idSer);
            $ser->delete();
            $request->session()->flash('success','Servicio eliminado');
        } catch (\Exception $e) {
            $request->session()->flash('info','Servicio no eliminado');
        }
        return redirect()->route('servicios');   
    }

    public function editarServicio($idSer)
    {
        $ser=Servicio::find($idSer);
        $data = array('ser' => $ser );
        return view('servicios.editar',$data);
    }

    public function actualizarServicio(RqActualizarServ $request)
    {
        $ser=Servicio::find($request->id);
        $ser->nombre=$request->nombre;
        $ser->precio=$request->precio;
        $ser->descripcion=$request->descripcion;

        
        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete('servicios/'.$ser->foto);

            $foto=$ser->id.'_'.Carbon::now().'.'.$request->foto->extension();
            $path = $request->foto->storeAs('servicios', $foto,'public');
            $ser->foto=$foto;    
            $ser->save();
        }

        $ser->save();
        $request->session()->flash('success','Servicio actualizado');
        return redirect()->route('servicios');
    }





    /*autos*/

    public function autos(AutoDataTable $dataTable)
    {
        return $dataTable->render('autos.index');
    }

    public function guardarAuto(RqIngreseoAuto $request)
    {
        $ser=new Auto;
        $ser->placa=$request->placa;
        $ser->color=$request->color;
        $ser->descripcion=$request->descripcion;
        $ser->duenio=$request->Propietario;
        $ser->save();
        
        if ($request->opcion=='orden') {
            $request->session()->flash('autook',$ser);
            return redirect()->route('ordenes');
        }else{
            $request->session()->flash('success','Vehículo guardado');
            return redirect()->route('autos');    
        }
        
    }

    public function eliminarAuto(Request $request,$idAuto)
    {
        try {
            $ser=Auto::find($idAuto);
            $ser->delete();
            $request->session()->flash('success','Vehículo eliminado');
        } catch (\Exception $e) {
            $request->session()->flash('info','Vehículo no eliminado');
        }
        return redirect()->route('autos');   
    }

    public function editarAuto($idAuto)
    {
        $ser=Auto::find($idAuto);
        $data = array('auto' => $ser );
        return view('autos.editar',$data);
    }

    public function actualizarAuto(RqActualizarAuto $request)
    {
        $ser=Auto::find($request->id);
        $ser->placa=$request->placa;
        $ser->color=$request->color;
        $ser->descripcion=$request->descripcion;
        $ser->duenio=$request->Propietario;
        $ser->save();
        $request->session()->flash('success','Vehículo actualizado');
        return redirect()->route('autos');
    }
}
