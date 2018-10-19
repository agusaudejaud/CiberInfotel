@extends('layouts.app')
@section('title', 'Articulos')

@section('content')

<script type="text/javascript" src="{{ URL::asset('assets/js/funciones_articulos.js') }}"></script>

<div class="container">
    <p align="center" class="title-form">[ LISTADO DE ARTICULOS ]</p>
    
    <div class="col-lg-4 col-md-4 col-sm-4">
        <a href="/articulos" class="btn btn-primary btn-block">LISTADO</a>
    <br>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
        <a href="articulos/create" class="btn btn-success btn-block">CARGAR</a>
        <br>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
        <a href="articulos/reporte" class="btn btn-warning btn-block" disabled>REPORTES</a>
        <br>
    </div>
</div>

<br>

<div class="col-lg-10 col-md-10 col-sm-12 col-lg-offset-1 col-md-offset-1">
    <table class="table table-bordered table-condensed tab-art" id="tab-articulos">
        <thead>
            <tr>
                <th class="nowrap text-left">Nombre Articulo</th>
                <th class="nowrap text-left">Marca</th>
                <th class="nowrap text-center">Disponibilidad</th>
                <th class="nowrap text-center">Precio Venta</th>
                <th class="nowrap text-center">Descripcion</th>
                <th class="nowrap text-center">Acciones</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($articulos as $articulo)
            <tr>
            <td class="text-center">
            {{$articulo->nombre}}
            </td >
            <td class="text-center">
            {{$articulo->nombreMarca->nombre}}
            </td>
            <td class="text-center">
            {{$articulo->disponibilidad}}
            </td>
            <td class="text-center">
            {{$articulo->precio_venta}}
            </td>
            <td class="text-center">
            {{$articulo->descripcion}}
            </td>
            <td>
               {!! Form::open(['method' => 'DELETE', 
                  'route' => ['articulos.destroy', $articulo->id]]) !!}
                  <button type="submit" class="btn btn-sm btn-danger col-sm pull-left"  >Eliminar</button>
                {!! Form::close() !!}      

                  <a href="{{route('articulos.edit', $articulo->id)}}" > <button type="submit" class="btn btn-sm btn-info col-sm pull-left"  >Editar</button></a>
                
          </td>
            </tr>
            
           
            @endforeach
        </tbody>
    </table>
</div>


@endsection
