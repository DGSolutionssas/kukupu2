var idVideoEliminar = "";
$(document).ready(function() {
    $('#myPleaseWait').modal('show');
    cargarTabla();
});

function cargarTabla() {
        $.ajax({
            type: "post",
            dataType: "json",
            url: "VideosBL.php",
            data: {action: 'obtenerVideos'}, 
            success: function(data) {
                $('#tableVideos').dataTable({
                    "iDisplayLength": 10,
                    "bProcessing": true,
                    "bPaginate": true,
                    "bDestroy": true,
                    "sPaginationType": "full_numbers",
                    language: {
                        "sProcessing": "Procesando...",
                        "sLengthMenu": "Mostrar _MENU_ registros",
                        "sZeroRecords": "No se encontraron resultados",
                        "sEmptyTable": "Ningún dato disponible en esta tabla",
                        "sInfo": "<b>Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros</b>",
                        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix": "",
                        "sSearch": "<b>Buscar : </b>",
                        "sUrl": "",
                        "sInfoThousands": ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst": "Primero",
                            "sLast": "Último",
                            "sNext": "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                    },
                    data: data,
                    columns: [{
                        'data': 'idVideo',
                        "sClass": "justify",
                        "width": "auto"
                    },
                    {
                        'data': 'TituloVideo',
                        "sClass": "justify",
                        "width": "auto"
                    },                    
                    {
                        'data': 'DescripcionVideo',
                        "sClass": "justify",
                        "width": "auto"
                    },
                    {
                        'data': 'Url',
                        "sClass": "justify",
                        "width": "auto"
                    },
                    {
                        data: null,
                        className: "center",
                        bSortable: false,
                        defaultContent: '<a href="#" data-dismiss="modal" class="btn btn-danger" OnClick="return obtenerLineaEliminar(this)"> Eliminar </a>'
                    }],
                });
                $('#myPleaseWait').modal('hide');
            },
            error: function() {
                $('#myPleaseWait').modal('hide');
                new PNotify({
                    title: 'Error!',
                    text: 'Por favor intentelo nuevamente.<br><b>Si el problema persiste contacte al Administrador</b>',
                    type: 'error'
                });

            }
        });
    }

function obtenerLineaEliminar(lnk)
{
    var row = lnk.parentNode.parentNode;
    var rowIndex = row.rowIndex - 1;
    idVideoEliminar = row.cells[0].innerHTML;
    VentanaEliminar('Confirmar Eliminacion', '¿Esta seguro de eliminar el ID <b>' + idVideoEliminar + '</b>?', 'SI', 'NO');
}

function Eliminar()
{
    jQuery.post('VideosBL.php', {action: 'eliminarVideo',idVideo: idVideoEliminar}, function (data) {
        if (data.error === 1)
        {
        }
        else
        {
            new PNotify({
                title: 'Transaccion Exitosa!',
                text: 'Se Elimino Correctamente',
                type: 'success'
            });
            confirmModal.modal('hide');
            cargarTabla();
        }
    });
}

function guardarVideo()
{
    var verdadero = $('#form1').parsley().validate("block1", true);
    if (verdadero)
    {
        var txtTituloVideo = document.getElementById("txtTituloVideo").value;
        var txtDescripcionVideo = document.getElementById("txtDescripcionVideo").value;
        var txtUrl = document.getElementById("txtUrl").value;
        var action='registrarVideo';
        
        jQuery.post('VideosBL.php', {txtTituloVideo: txtTituloVideo, txtDescripcionVideo: txtDescripcionVideo, txtUrl: txtUrl, action: action}, function (data) {
            if (data.error === 1)
            {
            }
            else
            {
                $('#VentanaRegistro').modal('hide');
                new PNotify({
                    title: 'Transaccion Exitosa!',
                    text: 'Video Registrado Correctamente',
                    type: 'success'
                });
                cargarTabla();
            }
        });
    }
}