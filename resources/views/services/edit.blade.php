@extends('adminlte::page')

@section('title', 'Junta Cerro Cora ')

@section('content_header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2><b>Editar Servicio</b></h2>
            </div>
        </div>
    </div>  
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <form id="quickForm" action="/servicio/{{$servicio->id}}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Descripción</label>
                                <input id="serv_descripcion" name="serv_descripcion" type="text" class="form-control" value="{{old('serv_descripcion', $servicio->serv_descripcion)}}" class="form-control" placeholder="Ingrese la descripcion">
                                    {{-- VALIDAR FORMULARIO CON JS --}}
                                    @error('serv_descripcion')
                                        <small class="text-danger"> *{{$message}} </small> 
                                        <br>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label>Impuesto</label>
                                <select class="form-control select2 select2-hidden-accessible" value="{{implode(',', $servicio->impuesto()->get()->pluck('impu_descripcion')->toArray())}}" style="width: 100%;" tabindex="3" aria-hidden="true" name="impu_codigo" id="impu_codigo">
                                    <option value="{{$servicios->impu_codigo}}">{{ $servicios->impuesto->impu_descripcion }}</option>
                                    <option value="1">10%</option>
                                    <option value="2">5%</option>
                                    <option value="3">EXENTAS</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="/servicio" class="btn btn-secondary" tabindex="5">Cancelar</a>
                            <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>  
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection