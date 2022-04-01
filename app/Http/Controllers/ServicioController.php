<?php

namespace App\Http\Controllers;

use App\Models\Impuesto;
use Illuminate\Http\Request;
use App\Models\Servicio;
use Illuminate\Support\Facades\DB;

class ServicioController extends Controller
{
    
    public function __construct() 
    {
        
        $this->middleware('can:servicio.index')->only('index');
        $this->middleware('can:servicio.create')->only('create','store');
        $this->middleware('can:servicio.edit')->only('edit', 'update');
        $this->middleware('can:servicio.destroy')->only('destroy');
  
    }


    public function index(Request $request)
    {

        $busqueda = $request->input('busqueda');

      $servicios = Servicio::query('impuesto')
                      ->where('serv_descripcion', 'LIKE', "%{$busqueda}%")
                      ->get();
       // $servicios = Servicio::with('impuesto')->orderBy('id')->get();
        //dd($servicios); */

    return view('services.index')->with('servicios',$servicios);

    }
    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {


        $request->validate([

            'serv_descripcion' => 'required',
            'impu_codigo' => 'required',
    
          ]);
    


        $servicios = new Servicio();
        $servicios->serv_descripcion = $request->serv_descripcion;
        $servicios->impu_codigo = $request->impu_codigo; 
        $servicios->save();

        return redirect('/servicio');
        
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit(Servicio $servicio)
    {
        $serv = $servicio->id;

        $servicios = Servicio::find($serv);
        $impu_codigo = $servicio->impu_codigo;
        $impuesto = Impuesto::where('id',$impu_codigo)->get('impu_descripcion');

        $servicio->load('impuesto');
        
        //dd($serv, $servicios, $servicio);

        return view('services.edit',compact('servicio', 'servicios'));
    }

    
    public function update(Request $request, $id)
    {

        $request->validate([

            'serv_descripcion' => 'required',
            'impu_codigo' => 'required',
    
          ]);
    

        $servicio = Servicio::find($id);

        $servicio->serv_descripcion = $request->get('serv_descripcion');
        $servicio->impu_codigo = $request->get('impu_codigo');

        $servicio->save();

        return redirect('/servicio'); 
    }

    
    public function destroy($id)
    {
        $servicio = Servicio::find($id);
        $servicio->delete();
        return redirect('/servicio')->with('eliminar', 'ok'); 
    }
}
