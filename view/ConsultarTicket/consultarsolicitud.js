var tabla;
var idUsuario =  $('#idx').val();
var idRol =  $('#rol_idx').val();

function init(){
    $("#ticket_form").on("submit",function(e){
        guardar(e);	
    });
}

$(document).ready(function(){

    /* TODO: Llenar Combo Categoria */
    $.post("../../controller/categoria.php?op=combo",function(data, status){
        $('#cat_id').html(data);
    });

    /* TODO: llenar Combo Prioridad */
    $.post("../../controller/prioridad.php?op=combo",function(data, status){
        $('#prio_id').html(data);
    });

    /* TODO:LLenar Combo usuario asignar */
    $.post("../../controller/usuario.php?op=combo", function (data) {
        $('#usu_asig').html(data);
    });

    /* TODO: rol si es 1 entonces es usuario */
    if (idRol==2){
        $('#viewuser').hide();

        tabla=$('#solicitud_data').dataTable({
            "aProcessing": true,
            "aServerSide": true,
            dom: 'Bfrtip',
            "searching": true,
            lengthChange: false,
            colReorder: true,
            buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                    ],
            "ajax":{
                url: '../../controllers/solicitud.php?op=listar_x_usu',
                type : "post",
                dataType : "json",
                data:{ idUsuario : idUsuario},
                error: function(e){
                    console.log(e.responseText);
                }
            },
            "ordering": false,
            "bDestroy": true,
            "responsive": true,
            "bInfo":true,
            "iDisplayLength": 10,
            "autoWidth": false,
            "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando un total de 0 registros",
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
            }     
        }).DataTable();
    }else{
        /* TODO: Filtro avanzado en caso de ser soporte */
      tabla=$('#solicitud_data').dataTable({
            "aProcessing": true,
            "aServerSide": true,
            dom: 'Bfrtip',
            "searching": true,
            lengthChange: false,
            colReorder: true,
            buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                    ],
            "ajax":{
                url: '../../controllers/solicitud.php?op=listar',
                type : "post",
                dataType : "json",
               
                error: function(e){
                    console.log(e.responseText);
                }
            },
            "ordering": false,
            "bDestroy": true,
            "responsive": true,
            "bInfo":true,
            "iDisplayLength": 10,
            "autoWidth": false,
            "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando un total de 0 registros",
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
            }     
        }).DataTable();
    }
});

/* TODO: Link para poder ver el detalle de ticket en otra ventana */
function ver(solicitud_id){
  console.log(solicitud_id);
    window.open('http://localhost:/URC1.0/view/DetalleSolicitud/?ID='+ solicitud_id +'');
}

/* TODO: Mostrar datos antes de asignar */
function asignar(solicitud_id){
    $.post("../../controller/solicitud.php?op=mostrar", {solicitud_id : solicitud_id}, function (data) {
        data = JSON.parse(data);
        $('#solicitud_id').val(data.solicitud_id);

        $('#mdltitulo').html('Asignar Agente');
        $("#modalasignar").modal('show');
    });
}

/* TODO: Guardar asignacion de usuario de soporte */
function guardar(e){
    e.preventDefault();
	var formData = new FormData($("#solicitud_form")[0]);
    $.ajax({
        url: "../../controller/solicitud.php?op=asignar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            var tick_id = $('#solicitud_id').val();
            /* TODO: enviar Email de alerta de asignacion */
            $.post("../../controller/email.php?op=solicitud_asignado", {solicitud_id : solicitud_id}, function (data) {

            });

            /* TODO: enviar Whaspp de alerta de asignacion */
            $.post("../../controller/whatsapp.php?op=w_solicitud_asignado", {solicitud_id : solicitud_id}, function (data) {

            });

            /* TODO: Alerta de confirmacion */
            swal("Correcto!", "Asignado Correctamente", "success");

            /* TODO: Ocultar Modal */
            $("#modalasignar").modal('hide');
            /* TODO:Recargar Datatable JS */
            $('#solicitud_data').DataTable().ajax.reload();
        }
    });
}

/* TODO:Reabrir ticket */
function CambiarEstado(solicitud_id){
    swal({
        title: "HelpDesk",
        text: "Esta seguro de Reabrir el Ticket?",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-warning",
        confirmButtonText: "Si",
        cancelButtonText: "No",
        closeOnConfirm: false
    },
    function(isConfirm) {
        if (isConfirm) {
            /* TODO: Enviar actualizacion de estado */
            $.post("../../controller/solicitud.php?op=reabrir", {solicitud_id : solicitud_id,idUsuario : idUsuario}, function (data) {

            });

            /* TODO:Recargar datatable js */
            $('#solicitud_data').DataTable().ajax.reload();	

            /* TODO: Mensaje de Confirmacion */
            swal({
                title: "HelpDesk!",
                text: "Ticket Abierto.",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
}

/* TODO:Filtro avanzado */
$(document).on("click","#btnfiltrar", function(){
    limpiar();

    var tick_titulo = $('#soli_titulo').val();
    var cat_id = $('#cat_id').val();
    var prio_id = $('#prio_id').val();

    listardatatable(soli_titulo,cat_id,prio_id);

});

/* TODO: Restaurar Datatable js y limpiar */
$(document).on("click","#btntodo", function(){
    limpiar();

    $('#soli_titulo').val('');
    $('#cat_id').val('').trigger('change');
    $('#prio_id').val('').trigger('change');

    listardatatable('','','');
});

/* TODO: Listar datatable con filtro avanzado */
function listardatatable(soli_titulo,cat_id,prio_id){
    tabla=$('#solicitud_data').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
                ],
        "ajax":{
            url: '../../controller/solicitud.php?op=listar_filtro',
            type : "post",
            dataType : "json",
            data:{ soli_titulo:soli_titulo,cat_id:cat_id,prio_id:prio_id},
            error: function(e){
                console.log(e.responseText);
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 10,
        "autoWidth": false,
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando un total de 0 registros",
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
        }     
    }).DataTable().ajax.reload();
}

/* TODO: Limpiamos restructurando el html del datatable js */
function limpiar(){
    $('#table').html(
        "<table id='ticket_data' class='table table-bordered table-striped table-vcenter js-dataTable-full'>"+
            "<thead>"+
                "<tr>"+
                    "<th style='width: 5%;'>Nro.Ticket</th>"+
                    "<th style='width: 15%;'>Categoria</th>"+
                    "<th class='d-none d-sm-table-cell' style='width: 30%;'>Titulo</th>"+
                    "<th class='d-none d-sm-table-cell' style='width: 5%;'>Prioridad</th>"+
                    "<th class='d-none d-sm-table-cell' style='width: 5%;'>Estado</th>"+
                    "<th class='d-none d-sm-table-cell' style='width: 10%;'>Fecha Creación</th>"+
                    "<th class='d-none d-sm-table-cell' style='width: 10%;'>Fecha Asignación</th>"+
                    "<th class='d-none d-sm-table-cell' style='width: 10%;'>Fecha Cierre</th>"+
                    "<th class='d-none d-sm-table-cell' style='width: 10%;'>Soporte</th>"+
                    "<th class='text-center' style='width: 5%;'></th>"+
                "</tr>"+
            "</thead>"+
            "<tbody>"+

            "</tbody>"+
        "</table>"
    );
}

init();