

@extends('layouts.app')

@section('title', 'Editar Pedidos')

@section('content')
<div class="container">
<div class="col-lg-4 col-md-4 col-sm-4">
        <a href="{{route('pedidos.index')}}" class="btn btn-primary btn-block">LISTADO</a>
    <br>
    </div>
    </div>
<div class="container">
<form class="form-group" action="{{route('pedidos.update', $ped->id)}}" method="post">

<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="_method" value="PUT">

<div class="form-group col-lg-6 col-md-6 col-sm-12">
<label for="nombre"><b>Numero de orden</b></label>
  <input type="text" class="form-control input-sm" name="numeroorden"  tabindex="1" value="{{$ped->numeroorden}}">
</div>

<div class="form-group col-lg-6 col-md-6 col-sm-12">
<label for="apellido"><b>Nombre del proveedor</b></label>
  <input type="text" class="form-control input-sm" name="proveedor" tabindex="2" value="{{$ped->proveedor}}">
</div>

<div class="form-group col-lg-6 col-md-6 col-sm-12">
<label for="rubro"><b>Fecha del pedido</b></label>
  <input type="date" class="form-control input-sm" name="fecha"  tabindex="3" value="{{$ped->fecha}}">
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