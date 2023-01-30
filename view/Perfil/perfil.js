var idUsuario = $('#idx').val();

$(document).ready(function(){
    $.post("../../controllers/usuario.php?op=mostrar_usuario", { idUsuario : idUsuario }, function (data) {
        
            data = JSON.parse(data);
            $('#usuario').val(data.usuario);
            $('#correo').val(data.correo);
            $('#pass').val(data.pass);
            $('#telefono').val(data.telefono);
           
        });
    });
    
    


$(document).on("click","#btnactualizar", function(){

    $.post("../../controllers/usuario.php?op=update_perfil", { 
        idUsuario:idUsuario,
        usuario : $('#usuario').val(),
        correo : $('#correo').val(),
        pass : $('#pass').val(),
        telefono : $('#telefono').val()
     }, function (data) {
    });

    Swal.fire({
        title: 'Correcto!',
        text: 'Se actualizo Correctamente',
        icon: 'success',
        confirmButtonText: 'Aceptar'
    })
});