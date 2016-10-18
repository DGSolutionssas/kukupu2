</div>
</div>
</div>

    <div class="modal fade bs-example-modal-sm" id="myPleaseWait" tabindex="-1" role="dialog"
        aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        <span class="fa fa-clock-o "></span> Cargando...
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="progress">
                        <div class="progress-bar progress-bar-modify
                    progress-bar-striped active" style="width: 100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</form>
</body>

<script type="text/javascript">
    function limpiar()
    {
        $('#form1').parsley().destroy();
        $('#VentanaRegistro').on('hidden.bs.modal', function (e) {
            $(this).find("input,textarea,select").val('').end().find("input[type=checkbox], input[type=radio]").prop("checked", "").end();
        });
    }
    
    function VentanaEliminar(titulo, pregunta, botonSi, botonNo, llamar) {
        confirmModal =
        $('<div id="VentanaEliminar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> <div class="modal-dialog modal-sm"> <div class="modal-content">' + '<div class="modal-header"> <button type="button" class="close" data-dismiss="modal"> <span aria-hidden="true">&times;</span><span class="sr-only">Cancelar</span></button>' + '<h4 class="modal-title" id="H1">' + titulo + '</h4></div> <div class="modal-body">' + pregunta + '</div> <div class="modal-footer">' + '<div class="form-row">' + '<a id="okButton" Onclick="Eliminar()" class="btn btn-success" name="btnAceptar">' + botonSi + '<a/>' + '<a id="cancelButton" data-dismiss="modal" class="btn btn-danger" name="btnCancelar">' + botonNo + '<a/>' + ' </div> </div> </div> </div> </div>');
        confirmModal.modal('show');
    }

</script>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/chartjs/chart.min.js"></script>
<script type="text/javascript" src="js/progressbar/bootstrap-progressbar.min.js"></script>
<script type="text/javascript" src="js/nicescroll/jquery.nicescroll.min.js"></script>
<script type="text/javascript" src="js/icheck/icheck.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/cropping/cropper.min.js"></script>
<script type="text/javascript" src="js/cropping/main.js"></script>
<script type="text/javascript" src="js/moment.min.js"></script>
<script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
<script type="text/javascript" src="js/moris/raphael-min.js"></script>
<script type="text/javascript" src="js/moris/morris.js"></script>

    
<script type="text/javascript" src="js/nicescroll/jquery.nicescroll.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/jqueryui/jquery-ui.css"/>

<!-- PNotify -->
<script type="text/javascript" src="js/notify/pnotify.core.js"></script>    
<script type="text/javascript" src="js/notify/pnotify.buttons.js"></script>    
<script type="text/javascript" src="js/notify/pnotify.nonblock.js"></script>
</html>