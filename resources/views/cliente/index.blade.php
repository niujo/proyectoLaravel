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

            <h2>Listado de Clientes</h2><br/>
                      
            <button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#abrirmodal">
                <i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp;Agregar cliente
            </button>
        </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                        {!! Form::open(array('url'=>'cliente','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}    
                        <div class="input-group">

                            <input type="text" name="buscarTexto" class="form-control" placeholder="Buscar texto">
                            <button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                        </div>
                        {{Form::close()}}    
                        </div>
                    </div>
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr class="bg-primary">
                                   
                        <th>Nombre</th>
                        <th>Apellido</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                               
                     @foreach($cliente as $pro)

                        <tr>
                                    
                        <td>{{$pro->nombre}}</td>
                        <td>{{$pro->apellido}}</td>
                    
                    

                        <td>
                        <button type="button" class="btn btn-info btn-md" data-id_cliente="{{$pro->id}}" data-nombre="{{$pro->nombre}}" data-apellido="{{$pro->apellido}}" data-toggle="modal" data-target="#abrirmodalEditarCli">

                            <i class="fa fa-edit fa-2x"></i> Editar
                        </button> &nbsp;
                        </td>

                    
                        </tr>

                    @endforeach
                               
                    </tbody>
                </table>

                {{$cliente->render()}}
            </div>
        </div>
    <!-- Fin ejemplo de tabla Listado -->
    </div>
<!--Inicio del modal agregar-->
    <div class="modal fade" id="abrirmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Cliente</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                       
        <div class="modal-body">                        
                        
            <form action="{{route('cliente.store')}}" method="post" class="form-horizontal">                              
                {{csrf_field()}}
                @include('cliente.form')

            </form>    
        </div>
                       
        </div>
<!-- /.modal-content -->
        </div>
<!-- /.modal-dialog -->
    </div>
 <!--Fin del modal-->
 <!--Inicio del modal Actualizar/EDITAR-->
    <div class="modal fade" id="abrirmodalEditarCli" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Cliente</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                       
        <div class="modal-body">                        
                        
            <form action="{{route('cliente.update','test')}}" method="post" class="form-horizontal">                              
                {{method_field('patch')}}
                {{csrf_field()}}

                    <input type="hidden" id="id_cliente" name="id_cliente" value="">

                @include('cliente.form')

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