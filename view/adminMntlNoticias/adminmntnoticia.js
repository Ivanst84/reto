var usu_id = $('#usu_idx').val();

var idx = $('idx').val();
function init(){
    $("#noticias_form").on("submit",function(e){
        guardaryeditar(e);

    });
    $("#imagen_form").on("submit",function(e){
        guardaryeditarimg(e);

    });


   
}

function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#noticias_form")[0]);
    $.ajax({
        url: "../../controllers/usuario.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data){
          
            $('#noticias_data').DataTable().ajax.reload();
            $('#modalmantenimiento').modal('hide');

            Swal.fire({
                title: 'Correcto!',
                text: 'Se Registro Correctamente',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            })
        }
    });
}



function nuevo(){
    $('#lbltitulo').html('Nuevo Registro');
    $('#noticias_form')[0].reset();
    
    $('#modalmantenimiento').modal('show');
}

$(document).ready(function(){
$('#noticias_data').DataTable({
    "aProcessing": true,
    "aServerSide": true,
    dom: 'Bfrtip',
    buttons: [
        
    ],
    "ajax":{
        url:"../../controllers/usuario.php?op=listar",
        type:"post"
    },
    "bDestroy": true,
    "responsive": true,
    "bInfo":true,
    "iDisplayLength": 10,
    "order": [[ 0, "desc" ]],
    "language": {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    },
});
});
function imagen(id){

    $('#idx').val(id);
   

    $('#modalfile').modal('show');


}

function eliminar(id){
    console.log(id);
    swal.fire({
        title: "Eliminar!",
        text: "Desea Eliminar el Registro?",
        icon: "error",
        confirmButtonText: "Si",
        showCancelButton: true,
        cancelButtonText: "No",
    }).then((result) => {
        if (result.value) {
            $.post("../../controllers/usuario.php?op=eliminar",{id: id}, function (data) {
                $('#noticias_data').DataTable().ajax.reload();

                Swal.fire({
                    title: 'Correcto!',
                    text: 'Se Elimino Correctamente',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                })
            });
        }
    });


}

function guardaryeditarimg(e){
  
    e.preventDefault();
    var formData = new FormData($("#imagen_form")[0]);
    
    $.ajax({ 
        url: "../../controllers/usuario.php?op=update_imagen_articulo",
        type: "POST",         
               data: formData,
                      contentType: false,
        processData: false,
        
        success: function(data){ 
            console.log(data);
            $('#noticias_data').DataTable().ajax.reload();
         
            $("#modalfile").modal('hide');
            
        }

    });


}
function editar(id){
    $.post("../../controllers/usuario.php?op=mostrar",{id : id}, function (data) {
        data = JSON.parse(data);
        $('#id').val(data.id);
        $('#titulo').val(data.titulo);
        $('#extracto').val(data.extracto);
               $('#texto').val(data.texto);
       
    });
    $('#lbltitulo').html('Editar Registro');
    $('#modalmantenimiento').modal('show');
}



init();
