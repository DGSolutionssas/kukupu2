function Login() {
    var txtUsuario = document.getElementById("txtUsuario").value;
    var txtContrasena = document.getElementById("txtContrasena").value;
    var action = 'iniciarSesion';

    $.ajax({
            data: {
                action: action,
                txtUsuario: txtUsuario,
                txtContrasena: txtContrasena
            },
            type: "POST",
            dataType: "json",
            url: "LoginBL.php",
        })
        .done(function(data, textStatus, jqXHR) {
            if (data.error == 1) {
                new PNotify({
                    title: 'Login Fallido!',
                    text: 'Valide Usuario y Contraseña',
                    type: 'success'
                });
            } else {
                location.href = "Inicio.php";
            }
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            if (console && console.log) {
                console.log("La solicitud a fallado: " + textStatus);
            }
        });
}
