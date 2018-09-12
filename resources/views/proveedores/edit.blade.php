
@extends('layouts.app')

@section('title', 'Editar Proveedor')

@section('content')

<div class="container">
<form class="form-group" action="{{route('proveedores.update', $proveedor->id)}}" method="post">

<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="_method" value="PUT">

<div class="form-group col-lg-6 col-md-6 col-sm-12">
  <label for="nombre"><b>Nombre Proveedor</b></label>
  <input type="text" class="form-control input-sm" name="nombre" placeholder="Indicar Nombre" tabindex="1" value="{{$proveedor->nombre}}">
</div>

<div class="form-group col-lg-6 col-md-6 col-sm-12">
  <label for="marca"><b>Apellido Proveedor</b></label>
  <input type="text" class="form-control input-sm" name="apellido" placeholder="Apellido" tabindex="2" value="{{$proveedor->apellido}}">
</div>

<div class="form-group col-lg-6 col-md-6 col-sm-12">
  <label for="marca"><b>Rubro</b></label>
  <input type="text" class="form-control input-sm" name="rubro" placeholder="Rubro" tabindex="2" value="{{$proveedor->rubro}}">
</div>

<div class="form-group col-lg-6 col-md-6 col-sm-12">
  <label for="precio_venta"><b>Telefono</b></label>
  <input type="text" class="form-control input-sm" name="telefono" placeholder="Telefono" tabindex="4" value="{{$proveedor->telefono}}">
</div>

<div class="form-group col-lg-6 col-md-6 col-sm-12">
  <label for="codigo_barras"><b>E-mail</b></label>
  <input type="text" class="form-control input-sm" name="email" placeholder="E-mail" value="{{$proveedor->email}}">
</div>

 <div class="form-group col-lg-6 col-md-6 col-sm-12">
  <label for="codigo_barras"><b>Cuit</b></label>
  <input type="text" class="form-control input-sm" name="cuit" placeholder="Cuit" value="{{$proveedor->cuit}}">
</div>

        <button type="submit" class="btn btn-sm btn-info" >editar</button>
</form>
</div>
@endsection