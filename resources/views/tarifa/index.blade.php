
@extends('adminlte::page')

@section('title', 'Junta Cerro Cora ')

@section('content_header')
<div class="d-flex align-items-center p-4 my-0 text-white bg-blue rounded shadow-sm">
    <h1>MOSTRAR TARIFA</h1>
</div>

<section class="content" >
    <button type="button" class="btn btn-primary align-items-center p-2 my-3" data-toggle="modal" data-target="#modal-default"> 
        Crear Tarifa    
      </button>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
              <th scope="col">tari_descripcion</th>
              <th scope="col">tari_m3_precio</th>
              <th scope="col">tari_imp_minimo</th>
              <th scope="col">tari_m3_minimo</th>
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
                    <form action="{{ route ('tarifa.destroy', $tarifa->id)}}" class="formulario-eliminar" method="POST">
                        @method('DELETE')        
                        @csrf
                        <a href="/tarifa/{{$tarifa->id}}/edit" class="btn btn-info">Editar</a>
                    <button type="submit" class= "btn btn-danger">Borrar</button>
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
                            <input class="form-control" placeholder="tari_descripcion" autocomplete="off" input id="tari_descripcion" name="tari_descripcion" type="text" class="form-control" tabindex="1" value="{{old('tari_descripcion')}}">
                                @error('tari_descripcion')
                                    <small class="text-danger">  *{{$message}} </small> 
                                <br>
                            @enderror
                        </div>
                    </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input class="form-control" placeholder="tari_imp_minimo" autocomplete="off" input id="tari_imp_minimo" name="tari_imp_minimo" type="number" class="form-control" tabindex="1" value="{{old('tari_imp_minimo')}}">
                                    @error('tari_imp_minimo')
                                        <small class="text-danger">  *{{$message}} </small> 
                                        <br>
                                    @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input class="form-control" placeholder="tari_m3_precio" autocomplete="off" input id="tari_m3_precio" name="tari_m3_precio" type="number" class="form-control" tabindex="1" value="{{old('tari_m3_precio')}}">
                                @error('tari_m3_precio')
                                    <small class="text-danger">  *{{$message}} </small> 
                                    <br>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input class="form-control" placeholder="tari_m3_minimo" autocomplete="off" input id="tari_m3_minimo" name="tari_m3_minimo" type="number" class="form-control" tabindex="1" value="{{old('tari_m3_minimo')}}">
                                    @error('tari_m3_minimo')
                                        <small class="text-danger">  *{{$message}} </small> 
                                        <br>
                                    @enderror
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

@section('js')   


    {{-- JS PARA ALET DIALOG --}}
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('eliminar') == 'ok')
    <script>

     Swal.fire(
        'Eliminado!',
        'Se ha eliminado correctamente.',
        'success'
        )

    </script>
    @endif

<script>
    $('.formulario-eliminar').submit(function(e){
        e.preventDefault();

        Swal.fire({
    title: 'Estás Seguro?',
    text: "Deseas eliminar de forma permanente!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sí, eliminar!'
    }).then((result) => {
    if (result.isConfirmed) {

        this.submit();
    }
    }) 
    });

</script>  
@endsection


