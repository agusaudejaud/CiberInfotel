<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Detalleped;
use App\Articulo;
use App\Pedido;

class DetallepedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }
    public function crearPedido($id){
        $pedido_id=$id;
        $articulos= Articulo::all();
        return view('detallesped.create',compact('articulos','pedido_id'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detalleped = new Detalleped();
        $detalleped->pedido= $request->input('pedido');
        $detalleped->cantidad= $request->input('cantidad');
        $detalleped->precio_costo= $request->input('precio_costo');
        $detalleped->articulo= $request->input('articulo');
        $detalleped->save();

        return redirect()->route('detallesped.show', $request->pedido); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido_id=$id;
        $detallesped= Detalleped::Where('pedido',$id)->get();
        return view('detallesped.index',compact('detallesped','pedido_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $detallesped= Detalleped::find($id);
        $articulos=Articulo::all();
        return view('detallesped.edit',compact('detallesped','articulos'));
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
        $detallesped = Detalleped::find($id);   

        $detallesped->fill($request->all());
        $detallesped->save();
        return redirect()->route('detallesped.show', $request->pedido);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detallesped = Detalleped::find($id);  
        $pedido=$detallesped->pedido;
        $detallesped->delete();
        return redirect()->route('detallesped.show', $pedido);
    }
}
