<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Medidor;
use Validator;
class MedidorController extends Controller
{

  public function __construct() 
  {
      
      $this->middleware('can:medidor.index')->only('index');
      $this->middleware('can:medidor.create')->only('create', 'store');
      $this->middleware('can:medidor.edit')->only('edit', 'update');
      $this->middleware('can:medidor.destroy')->only('destroy');

  }


    public function index(Request $request)
    {

      $busqueda = $request->input('busqueda');

      $medidors = Medidor::query()
                    ->where('medi_numero', 'LIKE', "%{$busqueda}%")
                    ->orWhere('medi_descripcion', 'LIKE', "%{$busqueda}%")
                    ->get();

      return view('medidor.index')->with('medidors',$medidors);
    }

    public function create()
    {
      return view('medidor.create');
    }

    public function store(Request $request)
    {

      /* VALIDACION DE FORMULARIO */

      $request->validate([

        'medi_numero' => 'required',
        'medi_descripcion' => 'required',
        'medi_estado' => 'required'

      ]);




      $medidors = new Medidor();

        $medidors->medi_numero = $request->get('medi_numero');
        $medidors->medi_descripcion = $request->get('medi_descripcion');
        $medidors->medi_estado = $request->get('medi_estado'); 

        $medidors->save();

        return redirect('/medidor'); 

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
      
      $medidor = Medidor::find($id);
      return view('medidor.edit')->with('medidor',$medidor);
    }


    public function update(Request $request, $id)
    {

      $request->validate([

        'medi_numero' => 'required',
        'medi_descripcion' => 'required',
        'medi_estado' => 'required'

      ]);



      $medidor = Medidor::find($id);

      $medidor->medi_numero = $request->get('medi_numero');
      $medidor->medi_descripcion = $request->get('medi_descripcion');
      $medidor->medi_estado = $request->get('medi_estado'); 

      $medidor->save();

      return redirect('/medidor'); 
    }


    public function destroy($id)
    {
      $medidor = Medidor::find($id);
      $medidor->delete();
      return redirect('/medidor')->with('eliminar', 'ok'); 
    }
}
