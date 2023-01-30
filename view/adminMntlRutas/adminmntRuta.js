var usu_id = $('#usu_idx').val();

function init(){
    $("#ruta_form").on("submit",function(e){
        
        guardaryeditar(e);
        window.location.reload();
    });
    
   
}

function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#ruta_form")[0]);
    $.ajax({
        url: "../../controllers/ruta.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data){
            $('#ruta_data').DataTable().ajax.reload();
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


$(document).ready(function()
   {
   
    $('#turno').select2({
        dropdownParent: $('#modalmantenimiento')
    });

    });

function nuevo(){
    $('#lbltitulo').html('Nuevo Registro');
    $('#ruta_form')[0].reset();
    
    $('#modalmantenimiento').modal('show');
}

$(document).ready(function(){
$('#ruta_data').DataTable({
    "aProcessing": true,
    "aServerSide": true,
    dom: 'Bfrtip',
    buttons: [
        'copyHtml5',
        'excelHtml5',
        'csvHtml5',
    ],
    "ajax":{
        url:"../../controllers/ruta.php?op=listar_ruta",
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


function eliminar(idRuta){
    console.log(idRuta);
    swal.fire({
        title: "Eliminar!",
        text: "Desea Eliminar el Registro?",
        icon: "error",
        confirmButtonText: "Si",
        showCancelButton: true,
        cancelButtonText: "No",
    }).then((result) => {
        if (result.value) {
            $.post("../../controllers/ruta.php?op=eliminar",{idRuta: idRuta}, function (data) {
                $('#ruta_data').DataTable().ajax.reload();

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
    var formData = new FormData($("#detalle_form")[0]);
    $.ajax({
        url: "../../controllers/usuario.php?op=update_imagen_articulo",
        type: "POST",
      
        
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){ 
            $('#cursos_data').DataTable().ajax.reload();
            Swal.fire({
                title: 'Correcto!',
                text: 'Se Actualizo Correctamente',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            })
            $("#modalfile").modal('hide');

        }
    });
}
function editar(idRuta){
    $.post("../../controllers/ruta.php?op=mostrar",{idRuta : idRuta}, function (data) {
        data = JSON.parse(data);

        
        $('#idRuta').val(data.idRuta);
        $('#nombreRuta').val(data.nombreRuta);
        $('#coordinador').val(data.coordinador);
               $('#turno').val(data.turno);
            
    });
  
    $('#lbltitulo').html('Editar Registro');
    $('#modalmantenimiento').modal('show');
    

}


init();

