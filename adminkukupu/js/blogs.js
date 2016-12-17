var idBlogEliminar = "";
$(document).ready(function() {
    $('#myPleaseWait').modal('show');
    cargarTabla();
});

function cargarTabla() {
        $.ajax({
            type: "post",
            dataType: "json",
            url: "BlogBL.php",
            data: {action: 'obtenerBlog'},
            success: function(data) {
                $('#tableBlog').dataTable({
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
                        'data': 'idBlog',
                        "sClass": "justify",
                        "width": "auto"
                    },
                    {
                        'data': 'titulo_blog',
                        "sClass": "justify",
                        "width": "auto"
                    },
                    {
                        'data': 'texto_blog',
                        "sClass": "justify",
                        "width": "auto"
                    },
					{
                        'data': 'Nombre',
                        "sClass": "justify",
                        "width": "auto"
                    },
					{
						data:   "activo_blog",
						render: function ( data ) {
								if ( data === '1' ) {
									return '<input type="checkbox" disabled readonly class="editor-active" checked >';
								}
								else
								{
									return '<input type="checkbox" disabled readonly class="editor-active">';
								}
								return data;
								},
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
    idBlogEliminar = row.cells[0].innerHTML;
    VentanaEliminar('Confirmar Eliminacion', '¿Esta seguro de eliminar el ID <b>' + idBlogEliminar + '</b>?', 'SI', 'NO');
}

function Eliminar()
{
    jQuery.post('BlogBL.php', {action: 'eliminarBlog',idBlog: idBlogEliminar}, function (data) {
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

function guardarBlog()
{
    var verdadero = $('#form1').parsley().validate("block1", true);
    if (verdadero)
    {
        var txtTituloBlog = document.getElementById("txtTituloBlog").value;
        var txtTextoBlog = document.getElementById("txtTextoBlog").value;
		var activo = document.getElementById("chkActivo").checked;
        var action='registrarBlog';

        jQuery.post('BlogBL.php', {txtTituloBlog:txtTituloBlog, txtTextoBlog:txtTextoBlog,activo: activo ,action: action}, function (data) {
            if (data.error === 1)
            {
				alert("paila");
            }
            else
            {
                $('#VentanaRegistro').modal('hide');
                new PNotify({
                    title: 'Transaccion Exitosa!',
                    text: 'Blog Registrado Correctamente',
                    type: 'success'
                });
                cargarTabla();
            }
        });
    }
}


function uploadAjax()
{
    var inputFileImage = document.getElementById("archivoImage");
    var file = inputFileImage.files[0];
    var data = new FormData();
    data.append("archivo",file);
    $('#myPleaseWait').modal('show');
    $.ajax({
        url:'CargarImagen.php',
        type:"POST",
        contentType:false,
        data: data,
        processData:false,
        cache:false,
        success: function(data) {
            $('#myPleaseWait').modal('hide');
            new PNotify({
                title: 'Correcto!',
                text: 'Archivo Cargado Correctamente',
                type: 'info'
             });

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
