
var usu_id = $('#usu_idx').val();

function init(){

}

$(document).ready(function(){
    $('#idRuta').select2();

    combo_curso();
    console.log(idRuta);

    /* Obtener Id de combo curso */
    $('#idRuta').change(function() {
        $("#idRuta option:selected").each(function () {
            idRuta = $(this).val();

            /* Listado de datatable */
            $('#detalle_data').DataTable({
                "aProcessing": true,
                "aServerSide": true,
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                ],
                "ajax":{ // arreglar rutas
                    url:"../../controllers/usuario.php?op=listar_ruta_oferente",
                    type:"post",
                    data:{idRuta:idRuta},
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
    });

});

function eliminar(ru_of_id){
    swal.fire({
        title: "Eliminar!",
        text: "Desea Eliminar el Registro?",
        icon: "error",
        confirmButtonText: "Si",
        showCancelButton: true,
        cancelButtonText: "No",
    }).then((result) => {
        if (result.value) {
            $.post("../../controllers/ruta.php?op=eliminar_ruta_oferente",{ru_of_id : ru_of_id}, function (data) {
                $('#detalle_data').DataTable().ajax.reload();
                console.log("eliminar",ru_of_id);
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

function combo_curso(){
    $.post("../../controllers/ruta.php?op=combo", function (data) {
        $('#idRuta').html(data);
    });
}


function nuevo(){
    if ($('#idRuta').val()==''){
        Swal.fire({
            title: 'Error!',
            text: 'Seleccionar Ruta',
            icon: 'error',
            confirmButtonText: 'Aceptar'
        })
    }else{
        var idRuta= $('#idRuta').val();
             listar_usuario(idRuta);
        $('#modalmantenimiento').modal('show');
    }
}

function listar_usuario(idRuta){
    $('#usuario_data').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
        ],
        "ajax":{
            url:"../../controllers/oferente.php?op=listar_detalle_oferente",
            type:"post",
            data:{idRuta:idRuta}
        
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
    
  console.log(idRuta);
}

function registrardetalle(){
    table = $('#usuario_data').DataTable();
    var id_o =[];

    table.rows().every(function(rowIdx, tableLoop, rowLoop) {
        cell1 = table.cell({ row: rowIdx, column: 0 }).node();
        if ($('input', cell1).prop("checked") == true) {
            id = $('input', cell1).val();
            id_o.push([id]);
        }
    });

    if (id_o== 0){
        Swal.fire({
            title: 'Error!',
            text: 'Seleccionar Usuarios',
            icon: 'error',
            confirmButtonText: 'Aceptar'
        })
    }else{
        /* Creando formulario */
        const formData = new FormData($("#form_detalle")[0]);
        formData.append('idRuta',idRuta);
        formData.append('id_o',id_o);
        console.log("ruta",idRuta);
        console.log("usuario",id_o);
        $.ajax({
            url: "../../controllers/ruta.php?op=insert_oferente_ruta",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success : function(data) {
                data = JSON.parse(data);

                data.forEach(e => {
                    e.forEach(i => {
                        console.log("intermedio",i['ru_of_id']);
                       
                    });
                });
            }
        });

        /* Recargar datatable de los usuarios del curso */
        $('#detalle_data').DataTable().ajax.reload();

        $('#usuario_data').DataTable().ajax.reload();
        /* ocultar modal */
        $('#modalmantenimiento').modal('hide');

    }
}

init();
