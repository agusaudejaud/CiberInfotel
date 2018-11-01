
@extends('layouts.app')

@section('title', 'Editar Proveedor')

@section('content')
<div class="container">
<div class="col-lg-4 col-md-4 col-sm-4">
        <a href="{{route('proveedores.index')}}" class="btn btn-primary btn-block">LISTADO</a>
    <br>
    </div>
    </div>
<div class="container">
<form class="form-group" action="{{route('proveedores.update', $proveedor->id)}}" method="post">

<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="_method" value="PUT">

<div class="form-group col-lg-6 col-md-6 col-sm-12">
  <label for="nombre"><b>Nombre Proveedor</b></label>
  <input type="text" class="form-control input-sm" name="nombre" placeholder="Indicar Nombre" tabindex="1" value="{{$proveedor->nombre}}">
</div>

<div class="form-group col-lg-6 col-md-6 col-sm-12">
  <label for="apellido"><b>Apellido Proveedor</b></label>
  <input type="text" class="form-control input-sm" name="apellido" placeholder="Apellido" tabindex="2" value="{{$proveedor->apellido}}">
</div>

<div class="form-group col-lg-6 col-md-6 col-sm-12">
  <label for="rubro"><b>Rubro</b></label>
  <input type="text" class="form-control input-sm" name="rubro" placeholder="Rubro" tabindex="3" value="{{$proveedor->rubro}}">
</div>

<div class="form-group col-lg-6 col-md-6 col-sm-12">
  <label for="telefono"><b>Telefono</b></label>
  <input type="text" class="form-control input-sm" name="telefono" placeholder="Telefono" tabindex="4" value="{{$proveedor->telefono}}">
</div>

<div class="form-group col-lg-6 col-md-6 col-sm-12">
  <label for="codigo_barras"><b>E-mail</b></label>
  <input type="text" class="form-control input-sm" name="email" placeholder="E-mail" tabindex="5"  value="{{$proveedor->email}}">
</div>

 <div class="form-group col-lg-6 col-md-6 col-sm-12">
  <label for="cuit"><b>Cuit</b></label>
  <input type="text" class="form-control input-sm" name="cuit" placeholder="Cuit" tabindex="6"  value="{{$proveedor->cuit}}">
</div>

     <br>

        <div class="container-fluid">
        
            <div class="col-lg-12 col-md-12 text-center">
                <input type="submit" class="btn btn-success btn-sm" value="CARGAR" tabindex="5">
            </div>
        </div>
</form>
</div>
@endsection