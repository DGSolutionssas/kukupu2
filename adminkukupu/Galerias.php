<?php
session_start();
include("Header.php");
if(!empty($_SESSION['autenticado']) && $_SESSION['autenticado'] == true)
{
?>
<div>
    <br><br><br><br>
    <div class="jumbotron">
     <button type="button" class="btn btn-success" onclick="limpiar();" data-toggle="modal" data-target="#VentanaRegistro"> Registrar Galeria</button>
        <script type="text/javascript" src="js/galerias.js"></script>
        <br><br>
        <table id="tableGalerias" class="display table table-hover table-bordered jambo_table">
            <thead>
                <tr>
                    <th>IDGALERIA</th>
                    <th>TITULO</th>
                    <th>URL</th>
                    <th>ACTIVO</th>
                    <th></th>
                 </tr>
            </thead>
        </table>
        </br>
    </div>

    <div id="VentanaRegistro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Cancelar</span>
                    </button>
                    <h4 class="modal-title" id="H3">
                        <p>REGISTRAR GALERIA</p>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <label class='control-label'>Titulo Galeria:</label>
                        <input autocomplete="off" type="text" id="txtTituloGaleria" name="txtTituloGaleria" data-parsley-required data-parsley-required-message="Dato Requerido." data-parsley-group="block1" class="form-control">
                    </div>
                    <div class="form-row ">
                        <label class='control-label'>Imagen Activa:</label>
                        <input autocomplete="off" type="checkbox" id="chkActivo" name="chkActivo" data-parsley-group="block1" class="form-control">
                    </div>
                    <div class="form-row">
                      <label class='control-label'>Imagen:</label>
                      <input type="file"  class="btn btn-warning"  name="archivoImage" id="archivoImage" />
                      <a id="btnCargar" type="submit" class="btn btn-success" name="btnCargar" onclick="uploadAjax();">
                        <span class="fa fa-cloud-upload"></span> Cargar Imagen</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class='form-row'>
                        <a id="btnGuardar" type="submit" class="btn btn-success" name="btnGuardar" onclick="guardarGaleria();">Guardar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="dvResultado"></div>
</div>
<?php
}
else {?><script type='text/javascript'>redireccionarInicio();</script>
<?php
}
include("Footer.php");
?>
