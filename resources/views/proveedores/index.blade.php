
@extends('layouts.app')

@section('title', 'Proveedor')

@section('content')
<script type="text/javascript" src="{{ URL::asset('assets/js/funciones_proveedores.js') }}"></script>



<div class="container">

    
    
    <div class="col-lg-4 col-md-4 col-sm-4">
        <a href="proveedores/create" class="btn btn-success btn-block">CARGAR</a>
        <br>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
        <a href="proveedores/reporte" class="btn btn-warning btn-block" disabled>REPORTES</a>
        <br>
    </div>
</div>

<br>



<div class="col-lg-10 col-md-10 col-sm-12 col-lg-offset-1 col-md-offset-1">
  <table class="table table-bordered table-condensed tab-art" id="proveedores">
    <thead>
      <tr>
        <th class="nowrap text-center" >Nombre Proveedor</th>
        <th class="nowrap text-center" >Apellido Proveedor</th>
        <th class="nowrap text-center">Rubro</th>
        <th class="nowrap text-center">Telefono</th>
        <th class="nowrap text-center">E-mail</th>
        <th class="nowrap text-center">Cuit</th>
        <th class="nowrap text-center">Acciones</th>



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
