
@extends('layouts.app')

@section('title', 'Proveedor')

@section('content')

<div class="container">
  <div class="col-lg-4 col-md-4 col-sm-4 text-center">
    <a href="proveedores/create" class="btn btn-sm btn-success">NUEVO PROVEEDOR</a>
  </div>
 
  
</div>
<br>

<div class="col-lg-10 col-md-10 col-sm-12 col-lg-offset-1 col-md-offset-1">
  <table class="table table-bordered table-condensed tab-art" id="tab-articulos">
    <thead>
      <tr>
        <th class="nowrap text-center" >Nombre</th>
        <th class="nowrap text-center" >Apellido</th>
        <th class="nowrap text-center">Rubro</th>
        <th class="nowrap text-center">Telefono</th>
        <th class="nowrap text-center">E-mail</th>
        <th class="nowrap text-center">Cuit</th>
        

      </tr>
    </thead>
    <tbody>
 
     @foreach ($proveedores as $proveedor)
        <tr>
          <td class="text-center">{{$proveedor->nombre}}</td>
          <td class="text-center">{{$proveedor->apellido}}</td>
          <td class="text-center">{{$proveedor->rubro}}</td>
          <td class="text-center">{{$proveedor->telefono}}</td>
           <td class="text-center">{{$proveedor->email}}</td>
            <td class="text-center">{{$proveedor->cuit}}</td>
            
          <td>
               {!! Form::open(['method' => 'DELETE', 
                  'route' => ['proveedores.destroy', $proveedor->id]]) !!}
                  <button type="submit" class="btn btn-sm btn-danger col-sm pull-left"  >Eliminar</button>
                {!! Form::close() !!}      

                 <a href="{{route('proveedores.edit', $proveedor->id)}}" > <button type="submit" class="btn btn-sm btn-info col-sm pull-left"  >Editar</button></a>
                
          </td>
            
         
        </tr>

      @endforeach
     
    </tbody>
  </table>
  </div>



         


@endsection
