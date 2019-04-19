<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;

// use Barryvdh\DomPDF\PDF;

class GeneratorPDF extends Controller
{
    public function imprimir(Request $request){
        $pedido = Pedido::where('id',$request->id)->first();
        $pdf = \PDF::loadView('dompdf',compact('pedido'));
        return $pdf->download("pedido$pedido->id.pdf");
    }
}
