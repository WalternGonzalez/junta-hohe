
@extends('adminlte::page')

@section('title', 'Junta Cerro Cora ')

@section('content_header')
<div class="d-flex align-items-center p-4 my-0 text-white bg-blue rounded shadow-sm">
    <h1>MOSTRAR TARIFA</h1>
</div>

<section class="content" >

    @can('tarifa.create')
    <button type="button" class="btn btn-primary align-items-center p-2 my-3" data-toggle="modal" data-target="#modal-default"> 
        Crear Tarifa    
      </button>         
    @endcan
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
              <th scope="col">tari_descripcion</th>
              <th scope="col">tari_m3_precio</th>
              <th scope="col">tari_imp_minimo</th>
              <th scope="col">tari_m3_minimo</th>
              <th scope="col">Opciones</th>
            </tr>
          </thead>
        <tbody>
            @foreach ($tarifas as $tarifa)
                <tr>
                    <td>{{$tarifa->id}}</td>
                    <td>{{$tarifa->tari_descripcion}}</td>
                    <td>{{$tarifa->tari_m3_precio}}</td>
                    <td>{{$tarifa->tari_imp_minimo}}</td>
                    <td>{{$tarifa->tari_m3_minimo}}</td>
                    <td>

                        @can('tarifa.destroy')                       
                    <form action="{{ route ('tarifa.destroy', $tarifa->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        @endcan

                        @can('tarifa.edit')  
                        <a href="/tarifa/{{$tarifa->id}}/edit" class="btn btn-info">Editar</a>
                    <button type="submit" class= "btn btn-danger">Borrar</button>
                        @endcan

                    </form>
                </td>
                </tr>
            @endforeach
        </tbody> 
      </table>

{{-- MODAL CREAR --}}

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Nueva Tarifa</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> 
        <div class="card card-info" >
            <form action="/tarifa" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input class="form-control" placeholder="tari_descripcion" autocomplete="off" input id="tari_descripcion" name="tari_descripcion" type="text" class="form-control" tabindex="1">
                        </div>
                    </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input class="form-control" placeholder="tari_imp_minimo" autocomplete="off" input id="tari_imp_minimo" name="tari_imp_minimo" type="number" class="form-control" tabindex="1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input class="form-control" placeholder="tari_m3_precio" autocomplete="off" input id="tari_m3_precio" name="tari_m3_precio" type="number" class="form-control" tabindex="1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input class="form-control" placeholder="tari_m3_minimo" autocomplete="off" input id="tari_m3_minimo" name="tari_m3_minimo" type="number" class="form-control" tabindex="1">
                            </div>
                        </div>
                    <div>
                        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>  
                        <a href="/tarifa" class="btn btn-secondary" tabindex="5">Cancelar</a>
                    </div>
                </div> 
            </form>
        </div>

        </div>
      </div>
    </div>
  <!-- /.modal CREAR-->

</section>
@endsection