<div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
        <div class="col-md-9">
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre de categoría" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$">
            
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="des">Apellido</label>
        <div class="col-md-9">
        <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Ingrese descripcion">
        </div>
    </div>    

    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i> Cerrar</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Guardar</button>
        
    </div>