<div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Cliente</label>
        <div class="col-md-9">
            <select class="form-control" name="id_cliente" id="id_cliente" required>
                <option value="0" disabled>Selecione</option>

                @foreach($cliente as $cli)
                    <option value="{{$cli->id}}">{{$cli->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="des">Producto</label>
        <div class="col-md-9">
            <select class="form-control" name="id_producto" id="id_producto" required>
                <option value="0" disabled>Selecione</option>

                @foreach($producto as $pro)
                    <option value="{{$pro->id}}">{{$pro->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="des">Cantidad</label>
        <div class="col-md-9">
        <input type="text" name="cantidad" id="cantidad" class="form-control" placeholder="Ingrese descripcion">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="des">Precio</label>
        <div class="col-md-9">
        <input type="text" name="precio" id="precio" class="form-control" placeholder="Ingrese descripcion">
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i> Cerrar</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Guardar</button>
        
    </div>