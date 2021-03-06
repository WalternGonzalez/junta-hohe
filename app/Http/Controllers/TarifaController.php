<?php

namespace App\Http\Controllers;

use App\Models\Tarifa;
use Illuminate\Http\Request;

class TarifaController extends Controller
{

    public function __construct() 
    {
        
        $this->middleware('can:tarifa.index')->only('index');
        $this->middleware('can:tarifa.create')->only('create','store');
        $this->middleware('can:tarifa.edit')->only('edit', 'update');
        $this->middleware('can:tarifa.destroy')->only('destroy');
  
    }


    public function index()
    {
        $tarifas = Tarifa::all();
        return view('tarifa.index')->with('tarifas',$tarifas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

 
    public function store(Request $request)
    {

          /* VALIDACION DE FORMULARIO */  
          $request->validate([

            'tari_descripcion' => 'required',
            'tari_m3_precio' => 'required',
            'tari_imp_minimo' => 'required',
            'tari_m3_minimo' => 'required'
    
          ]);



        $tarifas = new Tarifa();

        $tarifas->tari_descripcion = $request->get('tari_descripcion');
        $tarifas->tari_m3_precio = $request->get('tari_m3_precio');
        $tarifas->tari_imp_minimo = $request->get('tari_imp_minimo');
        $tarifas->tari_m3_minimo = $request->get('tari_m3_minimo'); 

        $tarifas->save();

        return redirect('/tarifa'); 
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $tarifa = Tarifa::find($id);
        return view('tarifa.edit')->with('tarifa',$tarifa);
    }

 
    public function update(Request $request, $id)
    {
          /* VALIDACION DE FORMULARIO */  
        $request->validate([

            'tari_descripcion' => 'required',
            'tari_m3_precio' => 'required',
            'tari_imp_minimo' => 'required',
            'tari_m3_minimo' => 'required'
    
          ]);

        $tarifa = Tarifa::find($id);

        $tarifa->tari_descripcion = $request->get('tari_descripcion');
        $tarifa->tari_m3_precio = $request->get('tari_m3_precio');
        $tarifa->tari_imp_minimo = $request->get('tari_imp_minimo');
        $tarifa->tari_m3_minimo = $request->get('tari_m3_minimo'); 
  
        $tarifa->save();
  
        return redirect('/tarifa'); 
    }

 
    public function destroy($id)
    {
        $tarifa = Tarifa::find($id);
        $tarifa->delete();
        return redirect('/tarifa')->with('eliminar', 'ok'); 
    }
}
