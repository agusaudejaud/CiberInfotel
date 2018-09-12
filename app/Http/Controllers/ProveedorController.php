<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Proveedor;


class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   



    public function index()
    {
        $proveedores = Proveedor::all();
        return view('/proveedores.index', compact('proveedores'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $proveedor = new Proveedor();
        $proveedor->nombre= $request->input('nombre');
        $proveedor->apellido= $request->input('apellido');
        $proveedor->rubro= $request->input('rubro');
        $proveedor->telefono= $request->input('telefono');
        $proveedor->email= $request->input('email');
        $proveedor->cuit= $request->input('cuit');
        // $proveedor->codigo_barras= $request->input('codigo_barras');
        $proveedor->save();

        return redirect()->route('proveedores.create');    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $proveedor= Proveedor::find($id);
       
       return view('proveedores.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $proveedor = Proveedor::find($id);
    $proveedor->fill($request->all());
    $proveedor->save();
    return redirect()->route('proveedores.index'); 
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveedor = Proveedor::find($id);  
        $proveedor->delete();
        return redirect()->route('proveedores.index');
    }

  


}
