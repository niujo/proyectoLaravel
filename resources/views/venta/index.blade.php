@extends('principal')
@section('contenido')
<main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="/">BACKEND - SISTEMA DE COMPRAS - VENTAS</a></li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">

                       <h2>Listado de Ventas</h2><br/>
                       
                        <button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#abrirmodal">
                            <i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp;Agregar Venta
                        </button>

                        </a>
                       
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <div class="col-md-6">
                            {!! Form::open(array('url'=>'venta','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!} 
                                <div class="input-group">
                                   
                                    <input type="text" name="buscarTexto" class="form-control" placeholder="Buscar texto" value="{{$buscarTexto}}">
                                    <button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            {{Form::close()}}
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr class="bg-primary">
                                    
                                    <th>Ver Detalle</th>
                                    <th>Cliente</th>
                                    <th>producto</th>                                    
                                    <th>Total</th>                                   
                                    
                                </tr>
                            </thead>
                            <tbody>

                              @foreach($venta as $vent)
                               
                                <tr>
                                    <td>
                                     
                                     <a href="{{URL::action('VentaController@show',$vent->id)}}">
                                       <button type="button" class="btn btn-warning btn-md">
                                         <i class="fa fa-eye fa-2x"></i> Ver detalle
                                       </button> &nbsp;

                                     </a>
                                   </td>

                                                              
                                    <td>{{$vent->cliente}}</td>                                    
                                    <td>{{$vent->nombre}}</td>
                                    <td>${{number_format($vent->precio,2)}}</td>
                                    
                                    <td>
                                      
                                      @if($vent->estado=="Registrado")
                                        <button type="button" class="btn btn-success btn-md">
                                    
                                          <i class="fa fa-check fa-2x"></i> Registrado
                                        </button>

                                      @else

                                        <button type="button" class="btn btn-danger btn-md">
                                    
                                          <i class="fa fa-check fa-2x"></i> Anulado
                                        </button>

                                       @endif
                                       
                                    </td>

                                    
                                    <td>

                                       @if($vent->estado=="Registrado")

                                        <button type="button" class="btn btn-danger btn-sm" data-id_venta="{{$vent->id}}" data-toggle="modal" data-target="#cambiarEstadoVenta">
                                            <i class="fa fa-times fa-2x"></i> Anular Venta
                                        </button>

                                        @else

                                         <button type="button" class="btn btn-success btn-sm">
                                            <i class="fa fa-lock fa-2x"></i> Anulado
                                        </button>

                                        @endif
                                       
                                    </td>

                                    <td>
                                       
                                        <a href="{{url('pdfVenta',$vent->id)}}" target="_blank">
                                           
                                           <button type="button" class="btn btn-info btn-sm">
                                            
                                             <i class="fa fa-file fa-2x"></i> Descargar PDF
                                           </button> &nbsp;

                                        </a> 

                                    </td>
                                </tr>

                                @endforeach
                               
                            </tbody>
                        </table>

                        {{$venta->render()}}
                        
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
                       
           
       <!--Inicio del modal agregar-->
    <div class="modal fade" id="abrirmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                       
        <div class="modal-body">                        
                        
            <form action="{{route('venta.store')}}" method="post" class="form-horizontal">                              
                {{csrf_field()}}
                @include('venta.form')

            </form>    
        </div>
                       
        </div>
<!-- /.modal-content -->
        </div>
<!-- /.modal-dialog -->
    </div>
 <!--Fin del modal-->
           
            
        </main>
@endsection