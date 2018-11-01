@extends('layouts.app')

@section('title', 'Crear Proveedor')

@section('content')
<div class="container">

<div class="col-lg-4 col-md-4 col-sm-4">
    <a href="{{route('proveedores.index')}}" class="btn btn-primary btn-block">LISTADO</a>
<br>
</div>

</div>

<br>
<div class="container">

  <form class="form-group" action="{{action('ProveedorController@store')}}" method="post">

    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="container-fluid">
    <div class="form-group col-lg-6 col-md-6 col-sm-12">
      <label for="nombre"><b>Nombre Proveedor</b></label>
      <input type="text" class="form-control input-sm" name="nombre" placeholder="Indicar Nombre" tabindex="1">
    </div>

    <div class="form-group col-lg-6 col-md-6 col-sm-12">
      <label for="apellido"><b>Apellido Proveedor</b></label>
      <input type="text" class="form-control input-sm" name="apellido" placeholder="Apellido" tabindex="2">
    </div>

    <div class="form-group col-lg-6 col-md-6 col-sm-12">
      <label for="rubro"><b>Rubro</b></label>
      <input type="text" class="form-control input-sm" name="rubro" placeholder="Rubro" tabindex="3">
    </div>

    <div class="form-group col-lg-6 col-md-6 col-sm-12">
      <label for="telefono"><b>Telefono</b></label>
      <input type="text" class="form-control input-sm" name="telefono" placeholder="Telefono" tabindex="4">
    </div>

    <div class="form-group col-lg-6 col-md-6 col-sm-12">
      <label for="email"><b>E-mail</b></label>
      <input type="text" class="form-control input-sm" name="email" placeholder="E-mail" tabindex="5" >
    </div>

     <div class="form-group col-lg-6 col-md-6 col-sm-12">
      <label for="cuit"><b>Cuit</b></label>
      <input type="text" class="form-control input-sm" name="cuit" placeholder="Cuit" tabindex="6" >
    </div>

    <div class="row text-center">
      <input type="submit" value="CARGAR" class="btn btn-success btn-sm">
    </div>
    
  </form>

</div>

@endsection
