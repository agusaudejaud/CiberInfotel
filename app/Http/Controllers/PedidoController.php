<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Pedido;
use App\Proveedor;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::all();
     
        return view('pedidos.index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = Proveedor::orderBy('nombre','ASC')->get();
        return view('pedidos.create', compact('proveedores'));
            }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $pedido = new Pedido();
        $pedido->numeroorden= $request->input('numeroorden');
        $pedido->proveedor= $request->input('proveedor');
        $pedido->fecha= $request->input('fecha');
        $pedido->save();

        return redirect()->route('pedidos.index');
    }

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
        $ped= Pedido::find($id);
        $proveedores = Proveedor::orderBy('nombre','ASC')->get();
        return view('pedidos.edit', compact('ped'),compact('proveedores'));
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
        $ped = Pedido::find($id);   
       
        $ped->fill($request->all());
        $ped->save();
        return redirect()->route('pedidos.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedidos = Pedido::find($id);  
        $pedidos->delete();
        return redirect()->route('pedidos.index');
    }
}
