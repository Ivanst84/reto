function init(){
   
}

$(document).ready(function(){
    var solicitud_id = getUrlParameter('ID');
   console.log(solicitud_id);
    listardetalle(solicitud_id);

    $('#tickd_descrip').summernote({
        height: 400,
        lang: "es-ES",
        callbacks: {
            onImageUpload: function(image) {
                console.log("Image detect...");
                myimagetreat(image[0]);
            },
            onPaste: function (e) {
                console.log("Text detect...");
            }
        }
    });

    $('#tickd_descripusu').summernote({
        height: 400,
        lang: "es-ES"
    });  

    $('#tickd_descripusu').summernote('disable');

});

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

$(document).on("click","#btnenviar", function(){
    var solicitud_id = getUrlParameter('ID');
    var idUsuario = $('#idx').val();
    var tickd_descrip = $('#tickd_descrip').val();

    if ($('#tickd_descrip').summernote('isEmpty')){
        Swal.fire("Advertencia!", "Falta Descripción", "warning");
    }else{
        $.post("../../controllers/solicitud.php?op=insertdetalle", { solicitud_id:solicitud_id,idUsuario:idUsuario,tickd_descrip:tickd_descrip}, function (data) {
            listardetalle(solicitud_id);
            $('#tickd_descrip').summernote('reset');
            Swal.fire("Correcto!", "Registrado Correctamente", "success");
        }); 
    }
});

$(document).on("click","#btncerrarticket", function(){
    
        
  
            var solicitud_id = getUrlParameter('ID');

           
            var idUsuario = $('#idx').val();
            console.log("asi".idUsuario);
            console.log(solicitud_id);
            $.post("../../controllers/solicitud.php?op=update", { solicitud_id : solicitud_id,idUsuario: idUsuario }, function (data) {

            }); 

            listardetalle(solicitud_id);


    
                       
            Swal.fire({
                title: "URC!",
                text: "Ticket Cerrado correctamente.",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        
        });


function listardetalle(solicitud_id){
    $.post("../../controllers/solicitud.php?op=listardetalle", { solicitud_id : solicitud_id }, function (data) {
        $('#lbldetalle').html(data);
    }); 

    $.post("../../controllers/solicitud.php?op=mostrar", { solicitud_id : solicitud_id }, function (data) {
        data = JSON.parse(data);
        $('#lblestado').html(data.soli_estado);
        $('#lblnomusuario').html(data.usuario +' '+data.correo);
        $('#lblfechcrea').html(data.fech_crea);
        
        $('#lblnomidticket').html("Detalle Ticket - "+data.solicitud_id);

        $('#cat_nom').val(data.cat_nom);
        $('#tick_titulo').val(data.soli_titulo);
        $('#tickd_descripusu').summernote ('code',data.soli_descrip);
       
        console.log(data.solicitud_estado_texto);
        if (data.solicitud_estado_texto == "Cerrado"){
            $('#pnldetalle').hide();
        }
    }); 
}

init();
