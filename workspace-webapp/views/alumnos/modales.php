
  <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="Nuevo Alumno">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Nuevo alumno</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-xs-12 no-padding">
              <div class="col-xs-12 col-sm-6">
                <p><b>Nombre *</b></p>
                <div class="ui left icon input">
                  <input type="text" name="nombre" class="nombre" placeholder="Nombre" required="required">
                  <i class="user icon"></i>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6">
                <p><b>Apellido *</b></p>
                <div class="ui left icon input">
                  <input type="text" name="apellido" class="apellido" placeholder="Apellido" required="required">
                  <i class="user icon"></i>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6">
                <p><b>Tipo de Documento</b></p>
                <select name="slt_tdoc" id="slt_tdoc" class="form-control slt_tdoc">
                  <option value="DNI">DNI</option>
                  <option value="LC">Libreta Cívica</option>
                </select>
              </div>
              <div class="col-xs-12 col-sm-6">
                <p><b>Nro de Documento *</b></p>
                <div class="ui left icon input">
                  <input type="number" name="nroDoc" class="nroDoc" placeholder="Nro de Documento" required="required">
                  <i class="id card icon"></i>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6">
                <p><b>Fecha de nacimiento *</b></p>
                <div class="ui left icon input">
                  <input type="date" name="fechaNac" class="fechaNac" id="fechaNac" placeholder="fechaNac" required="required">
                  <i class="calendar icon"></i>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6">
                <p><b>Legajo *</b></p>
                <div class="ui left icon input">
                  <input type="number" name="nroLegajo" class="nroLegajo" placeholder="Nro de Legajo" required="required">
                  <i class="barcode icon"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="ui buttons pull-right">
            <button class="ui button positive btnReg" id="btnReg">Guardar</button>
            <div class="or" data-text="O"></div>
            <a  data-dismiss="modal" class="ui button btnCancelArticle" >Cancelar</a>
          </div>
        </div>
      </div>
    </div>
  </div>