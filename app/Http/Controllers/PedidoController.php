<?php

namespace App\Http\Controllers;

use App\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {
        return Pedido::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    // $comidas = [];
    // for ($i=0; $i < sizeof($request->id_comida); $i++) { 
    //     $comida = [
    //         $request->id_comida[$i] => [ "cant_pedido_comida" => $request->cant_comida_pedido[$i]], 
    //     ];
    //     $comidas += $comida;
    // }
    // $dd = Pedido::create([
    //     "dni_cliente" => $request->dni_cliente,
    //     "price" => floatval(substr($request->total_pedido,0,-1)),
    // ]);
    // $dd->comidas()->attach($comidas)->save();
        $comidas = [];
        for ($i=0; $i < sizeof($request->id_comida); $i++) { 
            $comida = [
                "id_comida" => $request->id_comida[$i],
                "cant_pedido_comida" => $request->cant_comida_pedido[$i],
                "price_comida" => $request->price_comida[$i], 
                "name_comida" => $request->name_comida[$i], 
            ];
            array_push($comidas,$comida);
        }
        
        Pedido::create([
            "dni_cliente" => $request->dni_cliente,
            "price" => floatval(substr($request->total_pedido,0,-1)),
            "id_comidas" => json_encode($comidas),
        ]);

        return redirect()->intended('/cliente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $pedido = Pedido::where('id',$id)->first();
        $pedido->update(['is_deliver' => $request->is_deliver == "on" ? 1 : null]);

        return redirect()->intended('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
