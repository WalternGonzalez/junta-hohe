{{-- comment  

@extends('adminlte::page')

@section('title', 'Junta Cerro Cora ')

@section('content_header')
<Br>
    <h1>REGISTROS DE MEDIDORES</h1>
<Br>

<form action="/medidor" method="POST">
    @csrf
 <div class="mb3">
        <div class="col-md-5">
            <label for="" class="form-label">NUMERO DE MEDIDOR</label>
            <input id="medi_numero" name="medi_numero" type="text" class="form-control" tabindex="1" required>
        </div>
    </div>  
<div class="mb3">
    <div class="col-md-5">
        <label for="" class="form-label">DESCRIPCION</label>
        <input id="medi_descripcion" name="medi_descripcion" type="text" class="form-control" tabindex="1" required>
    </div>   
 </div>
 <div class="form-group">
    <label>Estado del Medidor</label>
    <select class="form-select" name="medi_estado" id="medi_estado" required>
      <option>Activo</option>
      <option>Inactivo</option>
 
    </select>
  </div>
 <br>
<button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>  
<a href="/medidor" class="btn btn-secondary" tabindex="5">Cancelar</a>
  

</form>
@endsection
--}}