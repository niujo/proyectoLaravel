<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use Illuminate\Support\Facades\Redirect;
use DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request) {

            $sql=trim($request->get('buscarTexto'));
            $producto = DB::table('producto')->where('nombre','LIKE','%'.$sql.'%')
            ->orderBy('id','desc')
            ->paginate(3);
            //listar en modal
            /* $producto=DB::table('producto')
            ->select('id','nombre','stock','precio')
            ->where('condicion','=','1')->get(); */

            return view('producto.index',["producto"=>$producto,"buscarTexto"=>$sql]);
            //return $producto;
        }

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
        $producto = new Producto();
        $producto->nombre= $request->nombre;
        $producto->stock= $request->stock;
        $producto->precio= $request->precio;
        $producto->condicion= '1';
        $producto->save();

        return Redirect::to("producto");
    }  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $producto = Producto::findOrFail($request->id_producto);
        $producto->nombre= $request->nombre;
        $producto->stock= $request->stock;
        $producto->precio= $request->precio;
        $producto->condicion= '1';
        $producto->save();

        return Redirect::to("producto");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $producto = Producto::findOrFail($request->id_producto);
        if ($producto->condicion == "1") {

            $producto->condicion = '0';
            $producto-> save();
            return Redirect::to("producto");
        }else {
            $producto->condicion = '1';
            $producto->save();
            return Redirect::to("producto");
        }
    }
}
