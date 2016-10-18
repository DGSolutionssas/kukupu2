<?php
session_start();
include("Header.php");
if(!empty($_SESSION['autenticado']) && $_SESSION['autenticado'] == true)
{
?>
<div>
    <br><br><br><br>
    <div class="jumbotron">
        <script type="text/javascript" src="js/videos.js"></script>
        <br><br>
        <table id="tableVideos" class="display table table-hover table-bordered jambo_table">
            <thead>
                <tr>
                    <th>IDVIDEO</th>
                    <th>TITULO</th>
                    <th>DESCRIPCION</th>
                    <th>URL</th>
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
                        <p>REGISTRAR VIDEO</p>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <label class='control-label'>Titulo Video:</label>
                        <input autocomplete="off" type="text" id="txtTituloVideo" name="txtTituloVideo" data-parsley-required data-parsley-required-message="Dato Requerido." data-parsley-group="block1" class="form-control">
                    </div>
                    <div class="form-row">
                        <label class='control-label'>Descripcion Video:</label>
                        <input autocomplete="off" type="text" id="txtDescripcionVideo" name="txtDescripcionVideo"  data-parsley-required data-parsley-required-message="Dato Requerido." data-parsley-group="block1" class="form-control">
                    </div>
                    <div class="form-row">
                        <label class='control-label'>Url:</label>
                        <input autocomplete="off" type="text" id="txtUrl" name="txtUrl" data-parsley-required data-parsley-required-message="Dato Requerido." data-parsley-group="block1" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <div class='form-row'>
                        <a id="btnGuardar" type="submit" class="btn btn-success" name="btnGuardar" onclick="guardarVideo();">Guardar</a>
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
