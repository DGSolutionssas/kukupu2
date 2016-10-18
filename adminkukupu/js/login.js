function Login()
{
    var txtUsuario = document.getElementById("txtUsuario").value;
    var txtContrasena = document.getElementById("txtContrasena").value;
    var action= 'iniciarSesion';
    
    jQuery.post('LoginBL.php', {action: action,txtUsuario: txtUsuario, txtContrasena: txtContrasena}, function (data) {
        if (data.error == "1")
        {
            new PNotify({
                title: 'Login Fallido!',
                text: 'Valide Usuario y Contraseña',
                type: 'success'
            });
        }
        else
        {
            location.href = "Inicio.php";
        }
    });
}