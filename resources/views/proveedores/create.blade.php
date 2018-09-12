@extends('layouts.app')

@section('title', 'Proveedor')

@section('content')

<div class="container">

  <form class="form-group" action="{{action('ProveedorController@store')}}" method="post">

    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <div class="form-group col-lg-6 col-md-6 col-sm-12">
      <label for="nombre"><b>Nombre Proveedor</b></label>
      <input type="text" class="form-control input-sm" name="nombre" placeholder="Indicar Nombre" tabindex="1">
    </div>

    <div class="form-group col-lg-6 col-md-6 col-sm-12">
      <label for="marca"><b>Apellido Proveedor</b></label>
      <input type="text" class="form-control input-sm" name="apellido" placeholder="Apellido" tabindex="2">
    </div>

    <div class="form-group col-lg-6 col-md-6 col-sm-12">
      <label for="marca"><b>Rubro</b></label>
      <input type="text" class="form-control input-sm" name="rubro" placeholder="Rubro" tabindex="2">
    </div>

    <div class="form-group col-lg-6 col-md-6 col-sm-12">
      <label for="precio_venta"><b>Telefono</b></label>
      <input type="text" class="form-control input-sm" name="telefono" placeholder="Telefono" tabindex="4">
    </div>

    <div class="form-group col-lg-6 col-md-6 col-sm-12">
      <label for="codigo_barras"><b>E-mail</b></label>
      <input type="text" class="form-control input-sm" name="email" placeholder="E-mail">
    </div>

     <div class="form-group col-lg-6 col-md-6 col-sm-12">
      <label for="codigo_barras"><b>Cuit</b></label>
      <input type="text" class="form-control input-sm" name="cuit" placeholder="Cuit">
    </div>

    <div class="row text-center">
      <input type="submit" value="CARGAR" class="btn btn-success btn-sm">
    </div>
    
  </form>

</div>

@endsection
