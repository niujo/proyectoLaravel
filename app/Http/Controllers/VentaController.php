<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Venta;
use App\Cliente;
use App\Producto;
use DB;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {

            $sql=trim($request->get('buscarTexto'));
            $venta = Venta::join('cliente','venta.idcliente','=','cliente.id')
            ->join('producto','venta.idproducto','=','producto.id')
            ->select('venta.id','venta.cantidad','venta.precio','producto.nombre','cliente.nombre as cliente','cliente.apellido as apellido')
            ->where('venta.id','LIKE','%'.$sql.'%')            
            ->orderBy('id','desc')
            ->paginate(3);

            $producto=DB::table('producto')
            ->select('id','nombre','stock','precio')
            ->where('condicion','=','1')->get();

            $cliente=DB::table('cliente')
            ->select('id','nombre','apellido')
            ->get();

            return view('venta.index',["venta"=>$venta,"producto"=>$producto,"cliente"=>$cliente,"buscarTexto"=>$sql]);
            //return $venta;
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cliente=DB::table('cliente')->get();

        $producto=DB::table('producto as prod')
        ->join('venta','prod.id','=','venta.idproducto')
        ->select(DB::raw('CONCAT(prod.nombre," ",prod.precio) AS producto'),'prod.id','prod.stock','prod.precio')
        ->where('prod.condicion','=','1')
        ->where('prod.stock','>','0')
        ->groupBy('producto','prod.id','prod.stock','prod.precio')
        ->get();

        return view('venta.create',["cliente"=>$cliente,"producto"=>$producto]);
            //return $venta;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       
           

            $venta = new Venta();
            $venta->idProducto = $request->id_producto;
            $venta->idCliente = $request->id_cliente;
            $venta->cantidad = $request->cantidad;
            $venta->precio = $request->precio;
            $venta->save();
            $id_producto=$request->id_producto;
            $id_cliente=$request->id_cliente;
      
        
        return Redirect::to("venta");
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
