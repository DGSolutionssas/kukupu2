<?php
session_start();
include("Header.php");
if(!empty($_SESSION['autenticado']) && $_SESSION['autenticado'] == true)
{
?>
<div>
    <br><br><br><br>
    <div class="jumbotron">
     <button type="button" class="btn btn-success" onclick="limpiar();" data-toggle="modal" data-target="#VentanaRegistro"> Registrar Blog</button>
        <script type="text/javascript" src="js/blogs.js"></script>
        <br><br>
        <table id="tableBlog" class="display table table-hover table-bordered jambo_table">
            <thead>
                <tr>
                    <th>IDBLOG</th>
                    <th>TITULO</th>
                    <th>TEXTO</th>
					<th>USUARIO</th>
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
                        <p>REGISTRAR BLOG</p>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <label class='control-label'>Titulo Blog:</label>
                        <input autocomplete="off" type="text" id="txtTituloBlog" name="txtTituloBlog" data-parsley-required data-parsley-required-message="Dato Requerido." data-parsley-group="block1" class="form-control">
                    </div>
					<div class="form-row">
                        <label class='control-label'>Texto Blog:</label>
                        <textarea autocomplete="off" type="text" id="txtTextoBlog" name="txtTextoBlog" data-parsley-required data-parsley-required-message="Dato Requerido." data-parsley-group="block1" class="form-control" rows="5"></textarea>
                    </div>
                    <div class="form-row ">
                        <label class="control-label">
						Blog Activo<input type="checkbox" id="chkActivo" name="chkActivo" data-parsley-group="block1" class="form-control">
						</label>
					</div>
                    
                </div>
                <div class="modal-footer">
                    <div class='form-row'>
                        <a id="btnGuardar" type="submit" class="btn btn-success" name="btnGuardar" onclick="guardarBlog();">Guardar</a>
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
